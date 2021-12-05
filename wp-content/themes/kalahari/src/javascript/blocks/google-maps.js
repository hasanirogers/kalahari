const { registerBlockType } = window.wp.blocks;
const { InspectorControls } = window.wp.blockEditor;
const { PanelBody, TextControl } = window.wp.components;

registerBlockType('kalahari/google-maps', {
  title: 'Google Maps',
  description: 'Displays a Google Map',
  icon: 'format-image',
  category: 'design',

  // custom attributes
  attributes: {
    url: {
      type: 'string',
      default: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2944.922509943795!2d-83.239039248154!3d42.42938427908026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8824cb174b6bfe2f%3A0xc9d9745c8106ff03!2sKalahari%20Cuisine!5e0!3m2!1sen!2sus!4v1638651864937!5m2!1sen!2sus'
    },
    width: {
      type: 'string',
      default: '100%'
    },
    height: {
      type: 'string',
      default: '480px'
    }
  },

  edit({ attributes, setAttributes }) {
    const {
        url,
        width,
        height,
    } = attributes;

    // custom functions
    const onChangeURL = (newURL) => {
      setAttributes({ url: newURL });
    }

    const onChangeWidth = (newWidth) => {
      setAttributes({ width: newWidth });
    }

    const onChangeHeight = (newHeight) => {
      setAttributes({ height: newHeight });
    }

    return ([
      <InspectorControls style={{ marginBottom: '40px' }}>
        <PanelBody title={ 'Attributes' }>
          <TextControl
            label="URL"
            value={ url }
            onChange={ onChangeURL }
          />
          <TextControl
            label="Width"
            value={ width }
            onChange={ onChangeWidth }
          />
          <TextControl
            label="Height"
            value={ height }
            onChange={ onChangeHeight }
          />
        </PanelBody>
      </InspectorControls>,
      <div className={`google-map`} style={{ border: '1px solid black', position: 'relative' }}>
        <div style={{ position: 'absolute', top: '0', right: '0', bottom: '0', left: '0' }}></div>
        <iframe src={ url } width={ width } height={ height } style={{ border:'0' }} allowfullscreen="" loading="lazy"></iframe>
      </div>
    ]);
  },

  save({ attributes }) {
    const {
      url,
      width,
      height
    } = attributes;

    return (
      <div className={`google-map break-container--full`}>
        <iframe src={ url } width={ width } height={ height }  style={{ border:'0' }} allowfullscreen="" loading="lazy"></iframe>
      </div>
    );
  }
});
