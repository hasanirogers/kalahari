import { html, css, LitElement } from 'lit';
import { unsafeHTML } from 'lit/directives/unsafe-html.js';
import 'kemet-ui';
import Glide from '@glidejs/glide';

// import { backArrow, forwardArrow } from '../../assets/svgs.js';

class KACMasthead extends LitElement {
  static get styles() {
    return [
      css`
        :host {
          display: block;
          position: relative;
          margin-left: calc(-25vw + 25%);
          margin-right: calc(-25vw + 25%);
        }

        img {
          object-fit: cover;
          width: 100%;
          height: 100%;
          filter: brightness(0.85);
        }

        h2 {
          margin: 0;
          font-weight: bold;
          font-size: 2rem;
          letter-spacing: 1px;
          text-shadow: black 1px 1px 1px;
          white-space: nowrap;
          text-overflow: ellipsis;
          overflow: hidden;
        }

        p {
          position: absolute;
          left: -9999rem;
          margin: 0;
          text-shadow: black 1px 1px 1px;
        }

        section {
          /* overflow: hidden; */
          height: 33vw;
          max-height: 480px;
          min-height: 320px;
        }

        .glide__caption {
          position: absolute;
          bottom: 0;
          width: 100%;
          padding: 1rem 1.5rem;
          background-color: rgba(26, 0, 3, 0.5);
        }

        .glide__slide {
          position: relative;
          overflow: hidden;
          padding: 1rem;
          outline-offset: -8px;
          outline: 1px solid rgba(255, 255, 255, 0.35);
        }

        .glide__track,
        .glide__slides {
          height: 100%;
        }

        .glide__bullets {
          display: flex;
          gap: 0.75rem;
          margin-top: 2rem;
          justify-content: center;
        }

        .glide__bullet {
          cursor: pointer;
          width: 32px;
          height: 32px;
          border: 0;
          position: relative;
          background: none;
        }

        .glide__bullet::before {
          content: '';

          position: absolute;
          top: 0;
          left: 0;
          display: inline-block;
          width: 32px;
          height: 2px;
          border: 0;
          opacity: 0.5;
          background: var(--color-primary);
        }

        .glide__bullet--active::before {
          cursor: auto;
          background: var(--color-tertiary);
        }

        @media only screen and (min-width: 768px) {
          p {
            position: static;
          }
        }
      `
    ];
  }

  static get properties() {
    return {
      slidesData: {
        type: Object
      }
    }
  }

  constructor() {
    super();

    this.domain = window.location.origin;
  }

  firstUpdated() {
    this.fetchSlides();
  }

  updated() {
    if (this.slidesData) this.initGlide();
  }

  render() {
    return html`
      <link rel="stylesheet" href="${this.domain}/wp-content/themes/kalahari/bundles/frontend.css" />
      <section class="glide">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
            ${this.makeSlides()}
          </ul>
        </div>
        <div class="glide__bullets" data-glide-el="controls[nav]">
          ${this.makePagination()}
        </div>
      </section>
    `;
  }

  async fetchSlides() {
    const slides = await fetch(`${this.domain}/?rest_route=/wp/v2/cuisines&per_page=99&_embed&order=asc`)
      .then(response => response.text())
      .then(text => {
        try {
          return JSON.parse(text);
        } catch (error) {
          // eslint-disable-next-line no-console
          console.error(error);
          return null;
        }
      });

    this.slidesData = slides;
  }

  makeSlides() {
    if (this.slidesData) {
      return this.slidesData.map((slide) => html`
        <li class="glide__slide">
          <img src="${slide._embedded['wp:featuredmedia'][0].source_url}" alt="${slide._embedded['wp:featuredmedia'][0].alt_txt}" />
          <div class="glide__caption">
            <h2>${unsafeHTML(slide.title.rendered)}</h2>
            ${unsafeHTML(slide.content.rendered)}
          </div>
        </li>
      `);
    }

    return null
  }

  makePagination() {
    if (this.slidesData) {
      const slides = this.slidesData.map((slide, index) => {
        const slideID = `=${index}`;

        return html`
          <button class="glide__bullet" data-glide-dir="${slideID}" aria-label="${slide.title.rendered}"></button>
        `;
      });

      return slides;
    }

    return null;
  }

  initGlide() {
    const glideElement = this.shadowRoot.querySelector('.glide');
    const glideOptions = {
      type: 'carousel',
      perView: 2,
      gap: 32,
      focusAt: 'center',
      autoplay: 12000,
      breakpoints: {
        768: {
          perView: 1,
          focusAt: 0
        }
      }
    };

    this.glide = new Glide(glideElement, glideOptions).mount();
  }
}

window.customElements.define('kac-masthead', KACMasthead);
