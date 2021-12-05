import { html, css, LitElement } from 'lit';
import { svgHamburger } from '../assets/svgs';

class KACHamburger extends LitElement {
  static get styles() {
    return css`
      :host {
        position: absolute;
        top: 1rem;
        right: 1rem;
        z-index: 5;
      }

      @media (min-width: 769px) {
        :host {
          display: none;
        }
      }
    `
  }

  firstUpdated() {
    this.addEventListener('click', (event) => this.handleClick(event));
  }

  render() {
    return html`
      ${svgHamburger}
    `;
  }

  handleClick(event) {
    const drawer = document.querySelector('kemet-drawer');
    drawer.opened = !drawer.opened;
  }
}

window.customElements.define('kac-hamburger', KACHamburger);
