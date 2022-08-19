import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { BlockEdit } from './edit';
import { BlockSave } from './save';

registerBlockType('tart/first-block', {
    title: __('First Block', 'tart'),
    icon: 'admin-users',
    category: 'tart-blocks',
    edit: BlockEdit,
    save: BlockSave,
    attributes: {}
});
