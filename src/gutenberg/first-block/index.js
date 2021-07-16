import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { BlockEdit } from './edit';
import { BlockSave } from './save';

registerBlockType('wptb/first-block', {
    title: __('First Block', 'wptb'),
    icon: 'admin-users',
    category: 'wptb-blocks',
    edit: BlockEdit,
    save: BlockSave,
    attributes: {}
});
