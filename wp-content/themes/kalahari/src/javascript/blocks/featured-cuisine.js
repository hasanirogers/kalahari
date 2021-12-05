const { registerBlockType } = window.wp.blocks;
const { InspectorControls } = window.wp.blockEditor;
const { PanelBody, TextControl } = window.wp.components;

registerBlockType('kalahari/featured-cuisine', {
  title: 'Feature Cuisine',
  description: 'Displays carousel of featured cuisines.',
  icon: 'format-image',
  category: 'design',

  // custom attributes
  attributes: {
    width: {
      type: 'string',
      default: 'auto'
    },
    height: {
      type: 'string',
      default: 'auto'
    }
  },

  edit({ attributes, setAttributes }) {
    const {
        width,
        height,
    } = attributes;

    // custom functions
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
      <h2>Featured cuisines appears here.</h2>
    ]);
  },

  save({ attributes }) {
    const {
      width,
      height
    } = attributes;

    return (
      <kac-masthead style={{ width, height }}></kac-masthead>
    );
  }
});
