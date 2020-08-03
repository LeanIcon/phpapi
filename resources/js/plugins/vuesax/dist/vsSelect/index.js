/*!
  * Vuesax v4.0.1-alpha.22 🖖 (https://lusaxweb.github.io/vuesax/)
  * Forged by Luis Daniel Rovira
  * Released under the MIT License.
  * Donate: https://www.patreon.com/bePatron?c=1567892
  * © 2019, Lusaxweb. (https://lusaxweb.net)
  */
!function(e,t){"object"==typeof exports&&"object"==typeof module?module.exports=t(require("vue")):"function"==typeof define&&define.amd?define(["vue"],t):"object"==typeof exports?exports.vsSelect=t(require("vue")):e.vsSelect=t(e.Vue)}("undefined"!=typeof self?self:this,function(i){return(o={},r.m=n=[function(e,t,i){"use strict";var n=i(4),a=i.n(n),s="undefined"!=typeof Reflect&&Reflect.defineMetadata&&Reflect.getOwnMetadataKeys;function c(i,n,r){(r?Reflect.getOwnMetadataKeys(n,r):Reflect.getOwnMetadataKeys(n)).forEach(function(e){var t=r?Reflect.getOwnMetadata(e,n,r):Reflect.getOwnMetadata(e,n);r?Reflect.defineMetadata(e,t,i,r):Reflect.defineMetadata(e,t,i)})}var u={__proto__:[]}instanceof Array;function l(r){return function(e,t,i){var n="function"==typeof e?e:e.constructor;n.__decorators__||(n.__decorators__=[]),"number"!=typeof i&&(i=void 0),n.__decorators__.push(function(e){return r(e,t,i)})}}var p=["data","beforeCreate","created","beforeMount","mounted","beforeDestroy","destroyed","beforeUpdate","updated","activated","deactivated","render","errorCaptured","serverPrefetch"];function r(e,n){void 0===n&&(n={}),n.name=n.name||e._componentTag||e.name;var r=e.prototype;Object.getOwnPropertyNames(r).forEach(function(t){if("constructor"!==t)if(-1<p.indexOf(t))n[t]=r[t];else{var i=Object.getOwnPropertyDescriptor(r,t);void 0!==i.value?"function"==typeof i.value?(n.methods||(n.methods={}))[t]=i.value:(n.mixins||(n.mixins=[])).push({data:function(){var e;return(e={})[t]=i.value,e}}):(i.get||i.set)&&((n.computed||(n.computed={}))[t]={get:i.get,set:i.set})}}),(n.mixins||(n.mixins=[])).push({data:function(){return function(n,e){var t=e.prototype._init;e.prototype._init=function(){var e=this,t=Object.getOwnPropertyNames(n);if(n.$options.props)for(var i in n.$options.props)n.hasOwnProperty(i)||t.push(i);t.forEach(function(t){"_"!==t.charAt(0)&&Object.defineProperty(e,t,{get:function(){return n[t]},set:function(e){n[t]=e},configurable:!0})})};var i=new e;e.prototype._init=t;var r={};return Object.keys(i).forEach(function(e){void 0!==i[e]&&(r[e]=i[e])}),r}(this,e)}});var t=e.__decorators__;t&&(t.forEach(function(e){return e(n)}),delete e.__decorators__);var i=Object.getPrototypeOf(e.prototype),o=i instanceof a.a?i.constructor:a.a,l=o.extend(n);return function(r,o,l){Object.getOwnPropertyNames(o).forEach(function(e){if(!h[e]){var t=Object.getOwnPropertyDescriptor(r,e);if(!t||t.configurable){var i=Object.getOwnPropertyDescriptor(o,e);if(!u){if("cid"===e)return;var n=Object.getOwnPropertyDescriptor(l,e);if(!function(e){var t=typeof e;return null==e||"object"!=t&&"function"!=t}(i.value)&&n&&n.value===i.value)return}0,Object.defineProperty(r,e,i)}}})}(l,e,o),s&&function(t,i){c(t,i),Object.getOwnPropertyNames(i.prototype).forEach(function(e){c(t.prototype,i.prototype,e)}),Object.getOwnPropertyNames(i).forEach(function(e){c(t,i,e)})}(l,e),l}var h={prototype:!0,arguments:!0,callee:!0,caller:!0};function o(t){return"function"==typeof t?r(t):function(e){return r(e,t)}}o.registerHooks=function(e){p.push.apply(p,e)};var f=o;i.d(t,"b",function(){return v}),i.d(t,"c",function(){return y}),i.d(t,"a",function(){return f});var d="undefined"!=typeof Reflect&&void 0!==Reflect.getMetadata;function b(e,t,i){d&&(Array.isArray(e)||"function"==typeof e||void 0!==e.type||(e.type=Reflect.getMetadata("design:type",t,i)))}function v(i){return void 0===i&&(i={}),function(e,t){b(i,e,t),l(function(e,t){(e.props||(e.props={}))[t]=i})(e,t)}}function y(n,e){void 0===e&&(e={});var t=e.deep,r=void 0!==t&&t,i=e.immediate,o=void 0!==i&&i;return l(function(e,t){"object"!=typeof e.watch&&(e.watch=Object.create(null));var i=e.watch;"object"!=typeof i[n]||Array.isArray(i[n])?void 0===i[n]&&(i[n]=[]):i[n]=[i[n]],i[n].push({handler:t,deep:r,immediate:o})})}},function(e,t){e.exports=function(i,n,e,t,r){var o={};return Object.keys(t).forEach(function(e){o[e]=t[e]}),o.enumerable=!!o.enumerable,o.configurable=!!o.configurable,("value"in o||o.initializer)&&(o.writable=!0),o=e.slice().reverse().reduce(function(e,t){return t(i,n,e)||e},o),r&&void 0!==o.initializer&&(o.value=o.initializer?o.initializer.call(r):void 0,o.initializer=void 0),void 0===o.initializer&&(Object.defineProperty(i,n,o),o=null),o}},function(e,t){e.exports=function(e,t,i,n){i&&Object.defineProperty(e,t,{enumerable:i.enumerable,configurable:i.configurable,writable:i.writable,value:i.initializer?i.initializer.call(n):void 0})}},function(e,t){e.exports=function(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}},function(e,t){e.exports=i},function(e,t,i){"use strict";i.d(t,"b",function(){return n}),i.d(t,"a",function(){return r}),i.d(t,"c",function(){return o}),i.d(t,"d",function(){return l});function u(e,t,i){i?"#comment"!==i.nodeName&&i.style.setProperty("--vs-"+e,t):document.documentElement.style.setProperty("--vs-"+e,t)}var n=function(e,t,i,n){var r,o=/^(rgb|rgba)/.test(t),l=/^(0|255|25[0-4]|2[0-4]\d|1\d\d|0?\d?\d),(0|255|25[0-4]|2[0-4]\d|1\d\d|0?\d?\d),(0|255|25[0-4]|2[0-4]\d|1\d\d|0?\d?\d)$/.test(t),a=/^(#)/.test(t);if("dark"==t&&i&&i.classList.add("vs-component-dark"),o){var s=t.replace(/[rgba()]/g,"").split(",");r=s[0]+","+s[1]+","+s[2],u(e,r,i),n&&i.classList.add("vs-change-color")}else if(a){var c=function(e){e=e.replace(/^#?([a-f\d])([a-f\d])([a-f\d])$/i,function(e,t,i,n){return t+t+i+i+n+n});var t=/^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(e);return t?{r:parseInt(t[1],16),g:parseInt(t[2],16),b:parseInt(t[3],16)}:null}(t);r=c.r+","+c.g+","+c.b,u(e,r,i),n&&i.classList.add("vs-change-color")}else if(function(e){return["primary","secondary","success","danger","warning","dark","light","warn","facebook","twitter","youtube","pinterest","linkedin","snapchat","whatsapp","tumblr","reddit","spotify","amazon","medium","vimeo","skype","dribbble","slack","yahoo","twitch","discord","telegram","google-plus","messenger"].includes(e)}(t)){r=getComputedStyle(document.body).getPropertyValue("--vs-"+t),u(e,r,i),n&&i.classList.add("vs-change-color")}else l&&(u(e,t,i),n&&i.classList.add("vs-change-color"))},r=function(e,t){var i=t||document.body;i.insertBefore(e,i.lastChild)},o=function(e,t){var i=t.getBoundingClientRect(),n=i.x,r=i.y,o=i.width,l=i.height,a=e.style,s=window.pageYOffset,c=e.clientHeight+i.y+s;s+window.innerHeight-c<30?(a.top=r+s-e.clientHeight-4+"px",a.left=n+"px",a.width=o+"px",e.classList.add("top"),t.classList.add("top")):(a.top=r+s+l-4+"px",a.left=n+"px",a.width=o+"px",e.classList.remove("top"),t.classList.remove("top"))},l=function(e,t,i){var n=t.getBoundingClientRect(),r=n.x,o=n.y,l=n.width,a=n.height,s=e.style,c=window.pageYOffset,u=e.clientHeight+n.y+c,p=c+window.innerHeight;if(r+l+10+e.getBoundingClientRect().width>window.innerWidth&&"right"==i&&(i="left",e.classList.remove("right"),e.classList.add("left")),r-10<e.getBoundingClientRect().width&&"left"==i&&(i="top",e.classList.remove("left"),e.classList.add("top")),p-u<30||"top"==i){s.top=o+c-e.clientHeight-8+"px";var h=r+(l-e.getBoundingClientRect().width)/2;h+e.getBoundingClientRect().width<window.innerWidth?0<h?s.left=h+"px":(s.left="10px",e.classList.add("notArrow")):(s.left="auto",s.right="10px",e.classList.add("notArrow"))}else if("bottom"==i){s.top=o+c+a+8+"px";var f=r+(l-e.getBoundingClientRect().width)/2;f+e.getBoundingClientRect().width<window.innerWidth?0<f?s.left=f+"px":(s.left="10px",e.classList.add("notArrow")):(s.left="auto",s.right="10px",e.classList.add("notArrow"))}else"left"==i?(s.top=o+c+(a-e.getBoundingClientRect().height)/2+"px",s.left=r-e.getBoundingClientRect().width-8+"px"):"right"==i&&(s.top=o+c+(a-e.getBoundingClientRect().height)/2+"px",s.left=r+l+8+"px")}},function(e,t){e.exports=function(e,t){e.prototype=Object.create(t.prototype),(e.prototype.constructor=e).__proto__=t}},function(e,t){function n(e,t){for(var i=0;i<t.length;i++){var n=t[i];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}e.exports=function(e,t,i){return t&&n(e.prototype,t),i&&n(e,i),e}},function(e,t){e.exports=function(e,t){throw new Error("Decorating class property failed. Please ensure that proposal-class-properties is enabled and runs after the decorators transform.")}},function(e,t,i){"use strict";i.d(t,"a",function(){return V});var n,r,o,l,a,s,c,u,p,h,f,d,b,v,y,g,O,m,w,j,_,$,C,x,P=i(2),k=i.n(P),D=i(7),S=i.n(D),E=i(3),L=i.n(E),z=i(6),B=i.n(z),R=i(1),W=i.n(R),T=(i(8),i(4)),M=i.n(T),A=i(0),F=i(5),V=(n=Object(A.b)({type:String,default:null}),r=Object(A.b)({type:Boolean,default:!1}),o=Object(A.b)({type:Boolean,default:!1}),l=Object(A.b)({type:Boolean,default:!1}),a=Object(A.b)({type:Boolean,default:!1}),s=Object(A.b)({type:Boolean,default:!1}),c=Object(A.b)({type:Boolean,default:!1}),u=Object(A.c)("color"),p=Object(A.c)("primary"),h=Object(A.c)("danger"),f=Object(A.c)("success"),d=Object(A.c)("warn"),b=Object(A.c)("dark"),Object(A.a)((x=C=function(r){function e(){for(var e,t=arguments.length,i=new Array(t),n=0;n<t;n++)i[n]=arguments[n];return(e=r.call.apply(r,[this].concat(i))||this).componentColor=null,k()(e,"color",g,L()(e)),k()(e,"danger",O,L()(e)),k()(e,"success",m,L()(e)),k()(e,"warn",w,L()(e)),k()(e,"dark",j,L()(e)),k()(e,"primary",_,L()(e)),k()(e,"active",$,L()(e)),e}B()(e,r);var t=e.prototype;return t.changeColor=function(){this.$el&&"#comment"!=this.$el.nodeName&&(this.componentColor=(this.danger?"danger":this.success&&"success")||this.warn&&"warn"||this.dark&&"dark"||this.primary&&"primary",(this.color||this.componentColor)&&(Object(F.b)("color",this.componentColor||this.color||"primary",this.$el,!0),this.$refs.options&&Object(F.b)("color",this.componentColor||this.color||"primary",this.$refs.options,!0),this.$refs.tooltip&&Object(F.b)("color",this.componentColor||this.color||"primary",this.$refs.tooltip,!0)),"dark"==this.componentColor||"dark"==this.color?this.$el.classList.add("vs-component-dark"):this.$el.classList.remove("vs-component-dark"),"white"==this.componentColor?this.$el.classList.add("vs-component-white"):this.$el.classList.remove("vs-component-white"))},t.handleWatchColor=function(){this.changeColor()},t.handleWatchPrimary=function(){this.changeColor()},t.handleWatchDanger=function(){this.changeColor()},t.handleWatchSuccess=function(){this.changeColor()},t.handleWatchWarn=function(){this.changeColor()},t.handleWatchDark=function(){this.changeColor()},t.updated=function(){this.changeColor()},t.mounted=function(){this.changeColor()},S()(e,[{key:"isColorDark",get:function(){return"dark"===this.color||this.dark||"dark"===this.componentColor}}]),e}(M.a),C.install=void 0,C.use=void 0,y=x,g=W()(y.prototype,"color",[n],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),O=W()(y.prototype,"danger",[r],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),m=W()(y.prototype,"success",[o],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),w=W()(y.prototype,"warn",[l],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),j=W()(y.prototype,"dark",[a],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),_=W()(y.prototype,"primary",[s],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),$=W()(y.prototype,"active",[c],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),W()(y.prototype,"handleWatchColor",[u],Object.getOwnPropertyDescriptor(y.prototype,"handleWatchColor"),y.prototype),W()(y.prototype,"handleWatchPrimary",[p],Object.getOwnPropertyDescriptor(y.prototype,"handleWatchPrimary"),y.prototype),W()(y.prototype,"handleWatchDanger",[h],Object.getOwnPropertyDescriptor(y.prototype,"handleWatchDanger"),y.prototype),W()(y.prototype,"handleWatchSuccess",[f],Object.getOwnPropertyDescriptor(y.prototype,"handleWatchSuccess"),y.prototype),W()(y.prototype,"handleWatchWarn",[d],Object.getOwnPropertyDescriptor(y.prototype,"handleWatchWarn"),y.prototype),W()(y.prototype,"handleWatchDark",[b],Object.getOwnPropertyDescriptor(y.prototype,"handleWatchDark"),y.prototype),v=y))||v)},function(e,t){e.exports=function(e,t,i){return t in e?Object.defineProperty(e,t,{value:i,enumerable:!0,configurable:!0,writable:!0}):e[t]=i,e}},function(e,t,i){},function(e,t,i){"use strict";i.d(t,"a",function(){return w});var n,r,o,l,a=i(10),s=i.n(a),c=i(2),u=i.n(c),p=i(3),h=i.n(p),f=i(6),d=i.n(f),b=i(1),v=i.n(b),y=(i(8),i(4)),g=i.n(y),O=i(0);i(11);function m(t,e){var i=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter(function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable})),i.push.apply(i,n)}return i}var w=(n=Object(O.b)({type:Boolean,default:!1}),Object(O.a)((o=function(r){function e(){for(var e,t=arguments.length,i=new Array(t),n=0;n<t;n++)i[n]=arguments[n];return e=r.call.apply(r,[this].concat(i))||this,u()(e,"less",l,h()(e)),e}return d()(e,r),e.prototype.render=function(e){return e("i",{staticClass:"vs-icon-arrow",class:{less:this.less},ref:"icon",on:function(t){for(var e=1;e<arguments.length;e++){var i=null!=arguments[e]?arguments[e]:{};e%2?m(i,!0).forEach(function(e){s()(t,e,i[e])}):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(i)):m(i).forEach(function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(i,e))})}return t}({},this.$listeners)})},e}(g.a),l=v()(o.prototype,"less",[n],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),r=o))||r)},function(e,t,i){"use strict";i.d(t,"a",function(){return g});var n,r,o,l,a=i(2),s=i.n(a),c=i(3),u=i.n(c),p=i(6),h=i.n(p),f=i(1),d=i.n(f),b=(i(8),i(4)),v=i.n(b),y=i(0),g=(i(11),n=Object(y.b)({type:String,default:null}),Object(y.a)((o=function(r){function e(){for(var e,t=arguments.length,i=new Array(t),n=0;n<t;n++)i[n]=arguments[n];return e=r.call.apply(r,[this].concat(i))||this,s()(e,"hover",l,u()(e)),e}return h()(e,r),e.prototype.render=function(e){return e("i",{staticClass:"vs-icon-close",class:["vs-icon-hover-"+this.hover],ref:"icon"})},e}(v.a),l=d()(o.prototype,"hover",[n],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),r=o))||r)},,,,,,,,,function(e,t,i){},,,,,,,,,,,,,,,,,,,,,,,,,,,,function(e,t,i){"use strict";i.r(t);i(22);var n,r,o,l,a,s,c,u,p,h,f,d,b,v,y,g,O,m,w,j,_,$,C,x,P,k,D,S=i(10),E=i.n(S),L=i(2),z=i.n(L),B=i(7),R=i.n(B),W=i(3),T=i.n(W),M=i(6),A=i.n(M),F=i(1),V=i.n(F),H=(i(8),i(0)),I=i(12),N=i(13),K=i(9),q=i(5);function G(t,e){var i=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter(function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable})),i.push.apply(i,n)}return i}var U=(n=Object(H.b)({}),r=Object(H.b)({type:Boolean,default:!1}),o=Object(H.b)({type:Boolean,default:!1}),l=Object(H.b)({type:String,default:""}),a=Object(H.b)({type:String,default:""}),s=Object(H.b)({type:String,default:""}),c=Object(H.b)({type:Boolean,default:!1}),u=Object(H.b)({type:Boolean,default:!1}),p=Object(H.b)({type:Boolean,default:!1}),h=Object(H.b)({type:String,default:null}),f=Object(H.b)({type:Boolean,default:!1}),d=Object(H.c)("textFilter"),b=Object(H.c)("value"),v=Object(H.c)("activeOptions"),Object(H.a)((g=function(r){function e(){for(var e,t=arguments.length,i=new Array(t),n=0;n<t;n++)i[n]=arguments[n];return e=r.call.apply(r,[this].concat(i))||this,z()(e,"value",O,T()(e)),z()(e,"multiple",m,T()(e)),z()(e,"filter",w,T()(e)),z()(e,"placeholder",j,T()(e)),z()(e,"labelPlaceholder",_,T()(e)),z()(e,"label",$,T()(e)),z()(e,"disabled",C,T()(e)),z()(e,"collapseChips",x,T()(e)),z()(e,"loading",P,T()(e)),z()(e,"state",k,T()(e)),z()(e,"block",D,T()(e)),e.renderSelect=!1,e.activeOptions=!1,e.valueLabel=null,e.hoverOption=-1,e.uids=[],e.childOptions=[],e.targetSelect=!1,e.targetSelectInput=!1,e.targetClose=!1,e.activeFilter=!1,e.textFilter=null,e.childVisibles=0,e._uid=void 0,e.isSelect=!0,e}A()(e,r);var t=e.prototype;return t.insertOptions=function(){var e=this.$refs.options;Object(q.a)(e,document.body),Object(q.c)(e,this.$refs.select)},t.clickOption=function(e,t){var i=this;if(this.multiple){var n=[].concat(this.value);-1==n.indexOf(e)?n.push(e):n.splice(n.indexOf(e),1),this.$emit("input",n)}else this.$emit("input",e),this.valueLabel=t;setTimeout(function(){i.multiple&&i.activeOptions&&i.$refs.chips.focus()},10),this.multiple||this.handleBlur()},t.setHover=function(){var i=this,n=-1;this.childOptions.forEach(function(e,t){e.value==i.value&&(n=t)}),this.hoverOption=n},t.getValue=function(){var i=this,e=this.childOptions.filter(function(e){return"number"==typeof i.value?i.value==e.value:-1!==i.value.indexOf(e.value)}),t=[];e.forEach(function(e){t.push({label:e.label,value:e.value})}),t.sort(function(e,t){return i.value.indexOf(e.value)-i.value.indexOf(t.value)}),this.valueLabel=t},t.handleBlur=function(){var e=this;this.$nextTick(function(){e.activeOptions=!1}),this.$emit("blur"),this.setHover(),window.removeEventListener("click",this.handleWindowClick),this.activeOptions&&(this.textFilter="",this.multiple||(this.activeFilter=!1))},t.blur=function(e){this.multiple&&e.relatedTarget&&this.targetSelectInput&&(this.targetSelect||this.activeOptions)||this.handleBlur(),this.filter&&(this.activeFilter=!1)},t.handleKeydown=function(e){for(var t=this,i=this.$refs.options,n=0;n<300;n++)setTimeout(function(){Object(q.c)(i,t.$refs.select)},n);"ArrowDown"==e.code?(event.preventDefault(),this.hoverOption<this.childOptions.length-1?this.hoverOption++:this.hoverOption=0):"ArrowUp"==e.code?(event.preventDefault(),0<this.hoverOption?this.hoverOption--:this.hoverOption=this.childOptions.length-1):"Enter"==e.code&&(event.preventDefault(),this.childOptions[this.hoverOption].disabled||(this.clickOption(this.childOptions[this.hoverOption].value,this.childOptions[this.hoverOption].label),this.multiple||(this.handleBlur(),this.$refs.input.blur()))),-1!==this.hoverOption&&(this.$refs.content.scrollTop=this.childOptions[this.hoverOption].$el.offsetTop-66)},t.handleWindowClick=function(e){var t=this;this.targetSelectInput||this.handleBlur(),this.filter&&!this.activeOptions&&(this.activeFilter=!1),e.target==this.$refs.input&&this.activeOptions&&!this.filter&&(this.handleBlur(),setTimeout(function(){t.$refs.input.blur()},100))},t.handleResize=function(){var e=this,t=this.$refs.options;if(t){this.$nextTick(function(){Object(q.c)(t,e.$refs.select)});for(var i=0;i<300;i++)setTimeout(function(){Object(q.c)(t,e.$refs.select)},i)}},t.handleScroll=function(){var e=this.$refs.options;e&&Object(q.c)(e,this.$refs.select)},t.beforeEnter=function(e){e.style.height=0},t.enter=function(e,t){var i=e.scrollHeight;e.style.height=i-1+"px",t()},t.leave=function(e,t){e.style.minHeight="0px",e.style.height="0px"},t.getMessage=function(e){return this.$createElement("transition",{on:{beforeEnter:this.beforeEnter,enter:this.enter,leave:this.leave}},[!!this.$slots["message-"+e]&&this.$createElement("div",{staticClass:"vs-select__message",class:["vs-select__message--"+e]},[this.$slots["message-"+e]])])},t.handleTextFilter=function(e){e?this.$refs.placeholder&&(this.$refs.placeholder.style.transition="0s"):this.$refs.placeholder&&(this.$refs.placeholder.style.transition="")},t.handleValue=function(e){var i=this;this.getValue(),setTimeout(function(){i.$emit("change",e)},10),this.multiple&&this.$nextTick(function(){var e=i.$refs.chips.scrollHeight;i.$refs.input.style.height=e+"px";var t=i.$refs.options;i.activeOptions&&i.$nextTick(function(){Object(q.c)(t,i.$refs.select)})}),e?this.$refs.placeholder&&(this.$refs.placeholder.style.transition="0s"):this.$refs.placeholder&&(this.$refs.placeholder.style.transition="")},t.handleActive=function(e){var t=this;this.$nextTick(function(){e&&t.insertOptions()}),this.uids=[]},t.mounted=function(){this.getValue(),this.renderSelect=!0,window.addEventListener("resize",this.handleResize),window.addEventListener("scroll",this.handleScroll)},t.beforeDestroy=function(){this.handleBlur(),window.removeEventListener("resize",this.handleResize),window.removeEventListener("scroll",this.handleScroll)},t.render=function(e){var t=this,i=e("transition",{props:{name:"vs-select"}},[this.activeOptions&&e("div",{staticClass:"vs-select__options",ref:"options",class:{isColorDark:this.isColorDark},on:{mouseleave:function(){t.targetSelect=!1,t.targetSelectInput=!1},mouseenter:function(){t.targetSelect=!0,t.targetSelectInput=!0}}},[e("div",{staticClass:"vs-select__options__content",ref:"content"},[this.notData&&e("div",{staticClass:"vs-select__options__content__not-data"},[this.$slots.notData||"No data available"]),this.$slots.default])])]),n=e("input",{attrs:{readonly:!this.filter&&!0,id:!this.multiple&&this._uid},staticClass:"vs-select__input",ref:"input",domProps:{value:this.activeFilter?this.textFilter:this.getValueLabel},class:[{multiple:this.multiple,simple:!this.multiple&&!this.filter}],on:function(t){for(var e=1;e<arguments.length;e++){var i=null!=arguments[e]?arguments[e]:{};e%2?G(i,!0).forEach(function(e){E()(t,e,i[e])}):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(i)):G(i).forEach(function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(i,e))})}return t}({},this.$listeners,{keydown:this.handleKeydown,focus:function(e){t.activeOptions=!0,t.$emit("focus",e),t.filter&&(t.activeFilter=!0),window.addEventListener("mousedown",t.handleWindowClick)},input:function(e){t.textFilter=e.target.value}})},this.$slots.default),r=e("button",{staticClass:"vs-select__chips",ref:"chips",on:{keydown:this.handleKeydown,focus:function(e){t.targetClose||(t.activeOptions=!0,t.$emit("focus",e)),t.filter&&t.multiple&&t.$refs.chips_input.focus()},blur:this.blur}},[].concat(this.getChips,[this.filter&&e("input",{staticClass:"vs-select__chips__input",ref:"chips_input",attrs:{placeholder:this.placeholder,id:this._uid},domProps:{value:this.textFilter},on:{focus:function(e){t.targetClose||(t.activeOptions=!0,t.$emit("focus",e))},blur:this.blur,input:function(e){t.textFilter=e.target.value}}})])),o=e(I.a,{on:{click:function(){t.activeOptions?t.activeOptions=!1:t.$refs.input.focus()}}}),l=e("label",{staticClass:"vs-select__label",attrs:{for:this._uid},class:{"vs-select__label--placeholder":this.labelPlaceholder,"vs-select__label--label":this.label,"vs-select__label--hidden":this.value}},[this.labelPlaceholder||this.label]),a=e("label",{staticClass:"vs-select__label",ref:"placeholder",attrs:{for:this._uid},class:{"vs-select__label--hidden":this.value||this.textFilter}},[this.placeholder]),s=e("div",{staticClass:"vs-select__loading"}),c=this.getMessage("success"),u=this.getMessage("danger"),p=this.getMessage("warn"),h=this.getMessage("primary"),f=e("div",{staticClass:"vs-select",ref:"select",class:["vs-select--state-"+this.state,{"vs-select--disabled":this.disabled,activeOptions:this.activeOptions,loading:this.loading}],on:{mouseleave:function(e){e.relatedTarget!==t.$refs.options&&(t.targetSelectInput=!1,t.targetSelect=!1)},mouseenter:function(){t.targetSelectInput=!0}}},[n,(!this.multiple||this.label)&&l,!this.multiple&&!this.labelPlaceholder&&a,this.multiple&&r,i,this.loading&&s,o]);return e("div",{staticClass:"vs-select-content",class:{block:this.block}},[f,c,u,p,h])},R()(e,[{key:"getValueLabel",get:function(){var e=this.valueLabel,t=[];return e&&e.forEach(function(e){t.push(e.label)}),t}},{key:"getChips",get:function(){function t(e,t){return i.$createElement("span",{staticClass:"vs-select__chips__chip",attrs:{"data-value":e.value},class:[{isCollapse:t}]},[e.label,!t&&i.$createElement("span",{staticClass:"vs-select__chips__chip__close",on:{click:function(){setTimeout(function(){i.targetClose=!1},100),i.activeOptions||(i.$refs.chips.blur(),i.filter&&i.$refs.chips_input.blur()),i.clickOption(e.value,e.label)},mouseleave:function(){i.targetClose=!1},mouseenter:function(){i.targetClose=!0}}},[i.$createElement(N.a,{props:{hover:"less"}})])])}var i=this,n=[];return this.valueLabel&&this.valueLabel.forEach(function(e){n.push(t(e,!1))}),this.collapseChips&&(n=[n[0],1<n.length&&t({label:"+"+(n.length-1),value:null},!0)]),n}},{key:"notData",get:function(){var t=[];return this.$slots.default.forEach(function(e){e.tag&&(e.componentInstance.hiddenOption||t.push(e))}),0==(t=t.filter(function(e){return!e.optionGroup||!e.componentInstance.hiddenOptionGroup})).length}}]),e}(K.a),O=V()(g.prototype,"value",[n],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),m=V()(g.prototype,"multiple",[r],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),w=V()(g.prototype,"filter",[o],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),j=V()(g.prototype,"placeholder",[l],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),_=V()(g.prototype,"labelPlaceholder",[a],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),$=V()(g.prototype,"label",[s],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),C=V()(g.prototype,"disabled",[c],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),x=V()(g.prototype,"collapseChips",[u],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),P=V()(g.prototype,"loading",[p],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),k=V()(g.prototype,"state",[h],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),D=V()(g.prototype,"block",[f],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),V()(g.prototype,"handleTextFilter",[d],Object.getOwnPropertyDescriptor(g.prototype,"handleTextFilter"),g.prototype),V()(g.prototype,"handleValue",[b],Object.getOwnPropertyDescriptor(g.prototype,"handleValue"),g.prototype),V()(g.prototype,"handleActive",[v],Object.getOwnPropertyDescriptor(g.prototype,"handleActive"),g.prototype),y=g))||y);U.install=function(e){e.component("vs-select",U)},"undefined"!=typeof window&&window.Vue&&U.install(window.Vue);t.default=U}],r.c=o,r.d=function(e,t,i){r.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:i})},r.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r.t=function(t,e){if(1&e&&(t=r(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var i=Object.create(null);if(r.r(i),Object.defineProperty(i,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var n in t)r.d(i,n,function(e){return t[e]}.bind(null,n));return i},r.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(t,"a",t),t},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},r.p="/dist/",r(r.s=50)).default;function r(e){if(o[e])return o[e].exports;var t=o[e]={i:e,l:!1,exports:{}};return n[e].call(t.exports,t,t.exports,r),t.l=!0,t.exports}var n,o});