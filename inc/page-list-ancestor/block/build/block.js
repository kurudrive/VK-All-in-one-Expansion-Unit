(()=>{"use strict";var e={n:t=>{var r=t&&t.__esModule?()=>t.default:()=>t;return e.d(r,{a:r}),r},d:(t,r)=>{for(var n in r)e.o(r,n)&&!e.o(t,n)&&Object.defineProperty(t,n,{enumerable:!0,get:r[n]})},o:(e,t)=>Object.prototype.hasOwnProperty.call(e,t)};const t=window.wp.blocks,r=window.React;var n,o,a;function l(){return l=Object.assign?Object.assign.bind():function(e){for(var t=1;t<arguments.length;t++){var r=arguments[t];for(var n in r)Object.prototype.hasOwnProperty.call(r,n)&&(e[n]=r[n])}return e},l.apply(this,arguments)}var c=function(e){return r.createElement("svg",l({width:24,height:24,fill:"none",xmlns:"http://www.w3.org/2000/svg"},e),n||(n=r.createElement("path",{d:"M24 21.5H11l-.3-1H23V2.4H2V13H1V1.4h23v20.1zM5.5 5C6.3 5 7 5.7 7 6.5S6.3 8 5.5 8 4 7.3 4 6.5 4.7 5 5.5 5zM20 7H9V6h11v1zM7 11.5c0-.8-.7-1.5-1.5-1.5S4 10.7 4 11.5v.4c.3-.2.6-.3 1-.3l2-.1zM20 17v-1h-7.9l-.9 1H20zm0-5H9v-1h11v1z",fill:"#000"})),o||(o=r.createElement("path",{d:"M10.9 14.8H7.6s-.1 0-.1.1l-.2.7c0 .1 0 .2.1.2h1.3c.1 0 .1.1.1.2l-2 2.2 1 3.4c0 .1 0 .1-.1.1h-1c-.1 0-.1 0-.1-.1L6 19.8c0-.1-.2-.1-.2 0L5.4 21v.1l.4 1.5.1.1h3.3c.1 0 .1-.1.1-.1L8 18.3v-.1l3-3.2c0-.1 0-.2-.1-.2z",fill:"#000"})),a||(a=r.createElement("path",{d:"m7.022 13-1.99.008a.11.11 0 0 0-.102.076l-.257.721c-.03.076.03.152.103.152h.836c.074 0 .125.076.103.152l-2.37 6.717a.108.108 0 0 1-.206 0l-1.703-4.848a.112.112 0 0 1 .103-.152h.859a.11.11 0 0 1 .103.076l.616 1.748a.108.108 0 0 0 .206 0l.954-2.72a.112.112 0 0 0-.103-.152H.108c-.073 0-.125.076-.103.152l3.127 8.996a.108.108 0 0 0 .205 0l3.787-10.774c.022-.076-.029-.152-.102-.152Z",fill:"#D8141C"})))};const i=JSON.parse('{"apiVersion":2,"name":"vk-blocks/page-list-ancestor","title":"Page List Ancestor","category":"veu-block","description":"Display Ansestor Pages","textdomain":"vk-all-in-one-expansion-unit","attributes":{},"supports":{"className":true}}'),s=window.wp.blockEditor,u=window.wp.serverSideRender;var p=e.n(u);function v(e){return v="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},v(e)}var b,m,f,y,d=i.name,h={icon:React.createElement(c,null),edit:function(e){var t=e.attributes,r=t.className,n=(0,s.useBlockProps)({className:"veu_contact_section_block ".concat(r)});return React.createElement(React.Fragment,null,React.createElement("div",n,React.createElement(p(),{block:"vk-blocks/page-list-ancestor",attributes:t})))}};(0,t.unstable__bootstrapServerSideBlockDefinitions)((b={},f=i,y=function(e,t){if("object"!=v(e)||!e)return e;var r=e[Symbol.toPrimitive];if(void 0!==r){var n=r.call(e,"string");if("object"!=v(n))return n;throw new TypeError("@@toPrimitive must return a primitive value.")}return String(e)}(d),(m="symbol"==v(y)?y:String(y))in b?Object.defineProperty(b,m,{value:f,enumerable:!0,configurable:!0,writable:!0}):b[m]=f,b)),(0,t.registerBlockType)(i,h)})();