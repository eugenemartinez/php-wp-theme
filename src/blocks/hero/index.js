import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls, MediaUpload } from '@wordpress/block-editor';
import { PanelBody, TextControl, RangeControl, Button } from '@wordpress/components';
import metadata from './block.json';

registerBlockType(metadata.name, {
  edit({ attributes, setAttributes }) {
    const {
      title,
      titleSpan,
      subtitle,
      description,
      ctaText,
      ctaUrl,
      backgroundImage,
      overlayOpacity
    } = attributes;

    const blockProps = useBlockProps();

    return (
      <>
        <InspectorControls>
          <PanelBody title="Hero Content">
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
            <TextControl
              label="Title Highlight"
              value={titleSpan}
              onChange={val => setAttributes({ titleSpan: val })}
            />
            <TextControl
              label="Description"
              value={description}
              onChange={val => setAttributes({ description: val })}
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
          <PanelBody title="Background Image">
            <MediaUpload
              onSelect={media => setAttributes({ backgroundImage: media.id })}
              allowedTypes={['image']}
              value={backgroundImage}
              render={({ open }) => (
                <Button
                  onClick={open}
                  variant="secondary"
                  style={{ marginBottom: '8px', width: '100%' }}>
                  {backgroundImage ? 'Change Image' : 'Select Image'}
                </Button>
              )}
            />
            {backgroundImage > 0 && (
              <Button
                onClick={() => setAttributes({ backgroundImage: 0 })}
                variant="link"
                isDestructive>
                Remove Image
              </Button>
            )}
            <RangeControl
              label="Overlay Opacity"
              value={overlayOpacity}
              onChange={val => setAttributes({ overlayOpacity: val })}
              min={0}
              max={100}
            />
          </PanelBody>
        </InspectorControls>

        <div {...blockProps}>
          <div style={{
            padding: '60px 20px',
            textAlign: 'center',
            background: backgroundImage ? '#1a1a1a' : '#f9f9f9',
            borderRadius: '8px',
            position: 'relative',
            overflow: 'hidden'
          }}>
            {backgroundImage > 0 && (
              <div style={{
                position: 'absolute',
                inset: 0,
                background: `rgba(0,0,0,${overlayOpacity / 100})`,
                borderRadius: '8px'
              }} />
            )}
            <div style={{ position: 'relative', zIndex: 1 }}>
              <p style={{
                fontSize: '12px',
                textTransform: 'uppercase',
                letterSpacing: '2px',
                color: backgroundImage ? '#aaa' : '#888'
              }}>
                {subtitle}
              </p>
              <h1 style={{
                fontSize: '48px',
                fontWeight: 'bold',
                margin: '16px 0',
                color: backgroundImage ? '#fff' : '#111'
              }}>
                {title} <span style={{ color: '#7c3aed' }}>{titleSpan}</span>
              </h1>
              <p style={{
                color: backgroundImage ? '#ccc' : '#666',
                marginBottom: '24px'
              }}>
                {description}
              </p>
              <span style={{
                background: '#7c3aed',
                color: '#fff',
                padding: '12px 32px',
                borderRadius: '999px'
              }}>
                {ctaText}
              </span>
            </div>
          </div>
        </div>
      </>
    );
  },

  save() {
    return null;
  }
});