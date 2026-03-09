import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl, TextareaControl } from '@wordpress/components';
import metadata from './block.json';

registerBlockType(metadata.name, {
  edit({ attributes, setAttributes }) {
    const { title, subtitle, description, email, location } = attributes;
    const blockProps = useBlockProps();

    return (
      <>
        <InspectorControls>
          <PanelBody title="Contact Content">
            <TextControl
              label="Subtitle"
              value={subtitle}
              onChange={val => setAttributes({ subtitle: val })}
            />
            <TextControl
              label="Title"
              value={title}
              onChange={val => setAttributes({ title: val })}
            />
            <TextareaControl
              label="Description"
              value={description}
              onChange={val => setAttributes({ description: val })}
            />
            <TextControl
              label="Email"
              value={email}
              onChange={val => setAttributes({ email: val })}
            />
            <TextControl
              label="Location"
              value={location}
              onChange={val => setAttributes({ location: val })}
            />
          </PanelBody>
        </InspectorControls>

        <div {...blockProps}>
          <div style={{ padding: '60px 20px', background: '#f9f9f9', borderRadius: '8px', textAlign: 'center' }}>
            <p style={{ fontSize: '12px', textTransform: 'uppercase', letterSpacing: '2px', color: '#888' }}>{subtitle}</p>
            <h2 style={{ fontSize: '36px', fontWeight: 'bold', margin: '12px 0' }}>{title}</h2>
            <p style={{ color: '#666', marginBottom: '16px' }}>{description}</p>
            <p style={{ color: '#888', fontSize: '14px' }}>{email} · {location}</p>
          </div>
        </div>
      </>
    );
  },

  save() {
    return null;
  }
});