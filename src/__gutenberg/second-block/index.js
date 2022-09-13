import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { BlockEdit } from './edit';
import { BlockSave } from './save';

registerBlockType('tboot/second-block', {
    title: __('Second Block', 'tboot'),
    icon: 'admin-users',
    category: 'tboot-blocks',
    edit: BlockEdit,
    save: BlockSave,
    attributes: {}
});
