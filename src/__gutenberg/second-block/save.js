import { useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';

export const BlockSave = (props) => {
    
    const blockProps = useBlockProps.save();
    
    return (
        <div {...blockProps}>
            <h4>{__('Second Block saved', 'tart')}</h4>
        </div>
    );
};
