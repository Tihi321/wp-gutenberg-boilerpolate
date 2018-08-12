/**
 * Block dependencies
 *
 * Text Domain: wp-boilerplate
 */
import icons from './icons';
import pluginConsts from '../../plugin-consts';
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
export default registerBlockType(
  `${pluginConsts.pluginName}/wp-example-block`,
  {
    title: __('Title of the block', 'wp-boilerplate'),
    description: __('Description for the side panel', 'wp-boilerplate'),
    category: 'common',
    icon: {
      background: 'rgba(254, 243, 224, 0.52)',
      src: icons.default,
    },
    keywords: [
      __('Keyword 01', 'wp-boilerplate'),
      __('Keyword 02', 'wp-boilerplate'),
      __('Keyword 03', 'wp-boilerplate'),
    ],
    edit: (props) => {
      const {className} = props;
      return <div className={className}>This is static block example.</div>;
    },
    save: (props) => {
      return null;
    },
  },
);
