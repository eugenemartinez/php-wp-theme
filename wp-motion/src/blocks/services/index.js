import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl, TextareaControl } from '@wordpress/components';
import metadata from './block.json';

registerBlockType(metadata.name, {
  edit({ attributes, setAttributes }) {
    const {
      title,
      subtitle,
      description,
      service1Title,
      service1Desc,
      service2Title,
      service2Desc,
      service3Title,
      service3Desc,
    } = attributes;

    const blockProps = useBlockProps();

    return (
      <>
        <InspectorControls>
          <PanelBody title="Section Content">
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
          </PanelBody>
          <PanelBody title="Service 1">
            <TextControl
              label="Title"
              value={service1Title}
              onChange={val => setAttributes({ service1Title: val })}
            />
            <TextareaControl
              label="Description"
              value={service1Desc}
              onChange={val => setAttributes({ service1Desc: val })}
            />
          </PanelBody>
          <PanelBody title="Service 2">
            <TextControl
              label="Title"
              value={service2Title}
              onChange={val => setAttributes({ service2Title: val })}
            />
            <TextareaControl
              label="Description"
              value={service2Desc}
              onChange={val => setAttributes({ service2Desc: val })}
            />
          </PanelBody>
          <PanelBody title="Service 3">
            <TextControl
              label="Title"
              value={service3Title}
              onChange={val => setAttributes({ service3Title: val })}
            />
            <TextareaControl
              label="Description"
              value={service3Desc}
              onChange={val => setAttributes({ service3Desc: val })}
            />
          </PanelBody>
        </InspectorControls>

        <div {...blockProps}>
          <div style={{ padding: '60px 20px', background: '#f9f9f9', borderRadius: '8px' }}>
            <p style={{ fontSize: '12px', textTransform: 'uppercase', letterSpacing: '2px', color: '#888' }}>{subtitle}</p>
            <h2 style={{ fontSize: '36px', fontWeight: 'bold', margin: '12px 0' }}>{title}</h2>
            <p style={{ color: '#666', marginBottom: '32px' }}>{description}</p>
            <div style={{ display: 'grid', gridTemplateColumns: 'repeat(3, 1fr)', gap: '16px' }}>
              {[
                { title: service1Title, desc: service1Desc },
                { title: service2Title, desc: service2Desc },
                { title: service3Title, desc: service3Desc },
              ].map((sv, i) => (
                <div key={i} style={{ background: '#fff', padding: '24px', borderRadius: '12px', border: '1px solid #eee' }}>
                  <h3 style={{ fontWeight: 'bold', marginBottom: '8px' }}>{sv.title}</h3>
                  <p style={{ color: '#666', fontSize: '14px' }}>{sv.desc}</p>
                </div>
              ))}
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