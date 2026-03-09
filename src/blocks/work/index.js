import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText } from '@wordpress/block-editor';

registerBlockType('theme/work', {
  edit: function Edit({ attributes, setAttributes }) {
    const { title, subtitle, description } = attributes;
    const blockProps = useBlockProps();

    return (
      <div {...blockProps} style={{ background: '#0a0a0a', padding: '60px 40px' }}>
        <p style={{ color: '#888', fontSize: '11px', letterSpacing: '3px', textTransform: 'uppercase', marginBottom: '12px' }}>
          <RichText
            tagName="span"
            value={subtitle}
            onChange={v => setAttributes({ subtitle: v })}
            placeholder="Capabilities"
          />
        </p>
        <RichText
          tagName="h2"
          value={title}
          onChange={v => setAttributes({ title: v })}
          placeholder="What We Do"
          style={{ color: '#fff', fontSize: '48px', fontWeight: '700', lineHeight: '1', marginBottom: '16px' }}
        />
        <RichText
          tagName="p"
          value={description}
          onChange={v => setAttributes({ description: v })}
          placeholder="Add a description..."
          style={{ color: 'rgba(255,255,255,0.5)', fontSize: '16px', maxWidth: '500px' }}
        />
        <p style={{ color: 'rgba(255,255,255,0.2)', fontSize: '13px', marginTop: '24px', fontStyle: 'italic' }}>
          Capability cards with live animations render on the frontend.
        </p>
      </div>
    );
  },
  save: () => null, // PHP render handles frontend
});