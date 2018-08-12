/**
 * Block dependencies
 */
import icons from './icons';
import pluginData from '../../plugin-data';
import './style.scss';
import './editor.scss';

/**
 * Internal block libraries
 */
const {__} = wp.i18n;
const {registerBlockType} = wp.blocks;

/**
 * Register block
 */
export default registerBlockType(`${pluginData.pluginName}/wp-example-block`, {
  title: __('Title of the block', pluginData.textDomain),
  description: __('Description for the side panel', pluginData.textDomain),
  category: 'common',
  icon: {
    background: 'rgba(254, 243, 224, 0.52)',
    src: icons.default,
  },
  keywords: [
    __('Keyword 01', pluginData.textDomain),
    __('Keyword 02', pluginData.textDomain),
    __('Keyword 03', pluginData.textDomain),
  ],
  edit: (props) => {
    const {className} = props;
    return <div className={className}>This is static block example.</div>;
  },
  save: (props) => {
    return null;
  },
});
