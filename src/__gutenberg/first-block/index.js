import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { BlockEdit } from './edit';
import { BlockSave } from './save';

registerBlockType('wptboot/first-block', {
    title: __('First Block', 'wptboot'),
    icon: 'admin-users',
    category: 'wptboot-blocks',
    edit: BlockEdit,
    save: BlockSave,
    attributes: {}
});
