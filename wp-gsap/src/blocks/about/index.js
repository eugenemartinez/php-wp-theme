import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls, MediaUpload } from '@wordpress/block-editor';
import { PanelBody, TextControl, TextareaControl, Button } from '@wordpress/components';
import metadata from './block.json';

registerBlockType(metadata.name, {
  edit({ attributes, setAttributes }) {
    const {
      title,
      subtitle,
      description,
      description2,
      ctaText,
      ctaUrl,
      image
    } = attributes;

    const blockProps = useBlockProps();

    return (
      <>
        <InspectorControls>
          <PanelBody title="About Content">
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
            <TextareaControl
              label="Description 2"
              value={description2}
              onChange={val => setAttributes({ description2: val })}
            />
            <TextControl
              label="CTA Text"
              value={ctaText}
              onChange={val => setAttributes({ ctaText: val })}
            />
            <TextControl
              label="CTA URL"
              value={ctaUrl}
              onChange={val => setAttributes({ ctaUrl: val })}
            />
          </PanelBody>
          <PanelBody title="Image">
            <MediaUpload
              onSelect={media => setAttributes({ image: media.id })}
              allowedTypes={['image']}
              value={image}
              render={({ open }) => (
                <Button
                  onClick={open}
                  variant="secondary"
                  style={{ marginBottom: '8px', width: '100%' }}>
                  {image ? 'Change Image' : 'Select Image'}
                </Button>
              )}
            />
            {image > 0 && (
              <Button
                onClick={() => setAttributes({ image: 0 })}
                variant="link"
                isDestructive>
                Remove Image
              </Button>
            )}
          </PanelBody>
        </InspectorControls>

        <div {...blockProps}>
          <div style={{ padding: '60px 20px', background: '#f9f9f9', borderRadius: '8px' }}>
            <p style={{ fontSize: '12px', textTransform: 'uppercase', letterSpacing: '2px', color: '#888' }}>{subtitle}</p>
            <h2 style={{ fontSize: '36px', fontWeight: 'bold', margin: '12px 0' }}>{title}</h2>
            <p style={{ color: '#666', marginBottom: '12px' }}>{description}</p>
            <p style={{ color: '#666', marginBottom: '24px' }}>{description2}</p>
            <span style={{ background: '#7c3aed', color: '#fff', padding: '12px 32px', borderRadius: '999px' }}>
              {ctaText}
            </span>
          </div>
        </div>
      </>
    );
  },

  save() {
    return null;
  }
});