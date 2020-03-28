!function(a){a.color={},a.color.make=function(b,c,d,e){var f={};return f.r=b||0,f.g=c||0,f.b=d||0,f.a=null!=e?e:1,f.add=function(a,b){for(var c=0;c<a.length;++c)f[a.charAt(c)]+=b;return f.normalize()},f.scale=function(a,b){for(var c=0;c<a.length;++c)f[a.charAt(c)]*=b;return f.normalize()},f.toString=function(){return f.a>=1?"rgb("+[f.r,f.g,f.b].join(",")+")":"rgba("+[f.r,f.g,f.b,f.a].join(",")+")"},f.normalize=function(){function a(a,b,c){return b<a?a:b>c?c:b}return f.r=a(0,parseInt(f.r),255),f.g=a(0,parseInt(f.g),255),f.b=a(0,parseInt(f.b),255),f.a=a(0,f.a,1),f},f.clone=function(){return a.color.make(f.r,f.b,f.g,f.a)},f.normalize()},a.color.extract=function(b,c){var d;do{if(d=b.css(c).toLowerCase(),""!=d&&"transparent"!=d)break;b=b.parent()}while(b.length&&!a.nodeName(b.get(0),"body"));return"rgba(0, 0, 0, 0)"==d&&(d="transparent"),a.color.parse(d)},a.color.parse=function(c){var d,e=a.color.make;if(d=/rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/.exec(c))return e(parseInt(d[1],10),parseInt(d[2],10),parseInt(d[3],10));if(d=/rgba\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]+(?:\.[0-9]+)?)\s*\)/.exec(c))return e(parseInt(d[1],10),parseInt(d[2],10),parseInt(d[3],10),parseFloat(d[4]));if(d=/rgb\(\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*\)/.exec(c))return e(2.55*parseFloat(d[1]),2.55*parseFloat(d[2]),2.55*parseFloat(d[3]));if(d=/rgba\(\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\s*\)/.exec(c))return e(2.55*parseFloat(d[1]),2.55*parseFloat(d[2]),2.55*parseFloat(d[3]),parseFloat(d[4]));if(d=/#([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/.exec(c))return e(parseInt(d[1],16),parseInt(d[2],16),parseInt(d[3],16));if(d=/#([a-fA-F0-9])([a-fA-F0-9])([a-fA-F0-9])/.exec(c))return e(parseInt(d[1]+d[1],16),parseInt(d[2]+d[2],16),parseInt(d[3]+d[3],16));var f=a.trim(c).toLowerCase();return"transparent"==f?e(255,255,255,0):(d=b[f]||[0,0,0],e(d[0],d[1],d[2]))};var b={aqua:[0,255,255],azure:[240,255,255],beige:[245,245,220],black:[0,0,0],blue:[0,0,255],brown:[165,42,42],cyan:[0,255,255],darkblue:[0,0,139],darkcyan:[0,139,139],darkgrey:[169,169,169],darkgreen:[0,100,0],darkkhaki:[189,183,107],darkmagenta:[139,0,139],darkolivegreen:[85,107,47],darkorange:[255,140,0],darkorchid:[153,50,204],darkred:[139,0,0],darksalmon:[233,150,122],darkviolet:[148,0,211],fuchsia:[255,0,255],gold:[255,215,0],green:[0,128,0],indigo:[75,0,130],khaki:[240,230,140],lightblue:[173,216,230],lightcyan:[224,255,255],lightgreen:[144,238,144],lightgrey:[211,211,211],lightpink:[255,182,193],lightyellow:[255,255,224],lime:[0,255,0],magenta:[255,0,255],maroon:[128,0,0],navy:[0,0,128],olive:[128,128,0],orange:[255,165,0],pink:[255,192,203],purple:[128,0,128],violet:[128,0,128],red:[255,0,0],silver:[192,192,192],white:[255,255,255],yellow:[255,255,0]}}(jQuery),function(a){"use strict";function c(b,c){var d=c.children("."+b)[0];if(null==d&&(d=document.createElement("canvas"),d.className=b,a(d).css({direction:"ltr",position:"absolute",left:0,top:0}).appendTo(c),!d.getContext)){if(!window.G_vmlCanvasManager)throw new Error("Canvas is not available. If you're using IE with a fall-back such as Excanvas, then there's either a mistake in your conditional include, or the page has no DOCTYPE and is rendering in Quirks Mode.");d=window.G_vmlCanvasManager.initElement(d)}this.element=d;var e=this.context=d.getContext("2d"),f=window.devicePixelRatio||1,g=e.webkitBackingStorePixelRatio||e.mozBackingStorePixelRatio||e.msBackingStorePixelRatio||e.oBackingStorePixelRatio||e.backingStorePixelRatio||1;this.pixelRatio=f/g,this.resize(c.width(),c.height()),this.textContainer=null,this.text={},this._textCache={}}function d(b,d,f,g){function v(a,b){b=[u].concat(b);for(var c=0;c<a.length;++c)a[c].apply(this,b)}function w(){for(var b={Canvas:c},d=0;d<g.length;++d){var e=g[d];e.init(u,b),e.options&&a.extend(!0,i,e.options)}}function x(c){a.extend(!0,i,c),c&&c.colors&&(i.colors=c.colors),null==i.xaxis.color&&(i.xaxis.color=a.color.parse(i.grid.color).scale("a",.22).toString()),null==i.yaxis.color&&(i.yaxis.color=a.color.parse(i.grid.color).scale("a",.22).toString()),null==i.xaxis.tickColor&&(i.xaxis.tickColor=i.grid.tickColor||i.xaxis.color),null==i.yaxis.tickColor&&(i.yaxis.tickColor=i.grid.tickColor||i.yaxis.color),null==i.grid.borderColor&&(i.grid.borderColor=i.grid.color),null==i.grid.tickColor&&(i.grid.tickColor=a.color.parse(i.grid.color).scale("a",.22).toString());var d,e,f,g=b.css("font-size"),h=g?+g.replace("px",""):13,j={style:b.css("font-style"),size:Math.round(.8*h),variant:b.css("font-variant"),weight:b.css("font-weight"),family:b.css("font-family")};for(f=i.xaxes.length||1,d=0;d<f;++d)e=i.xaxes[d],e&&!e.tickColor&&(e.tickColor=e.color),e=a.extend(!0,{},i.xaxis,e),i.xaxes[d]=e,e.font&&(e.font=a.extend({},j,e.font),e.font.color||(e.font.color=e.color),e.font.lineHeight||(e.font.lineHeight=Math.round(1.15*e.font.size)));for(f=i.yaxes.length||1,d=0;d<f;++d)e=i.yaxes[d],e&&!e.tickColor&&(e.tickColor=e.color),e=a.extend(!0,{},i.yaxis,e),i.yaxes[d]=e,e.font&&(e.font=a.extend({},j,e.font),e.font.color||(e.font.color=e.color),e.font.lineHeight||(e.font.lineHeight=Math.round(1.15*e.font.size)));for(i.xaxis.noTicks&&null==i.xaxis.ticks&&(i.xaxis.ticks=i.xaxis.noTicks),i.yaxis.noTicks&&null==i.yaxis.ticks&&(i.yaxis.ticks=i.yaxis.noTicks),i.x2axis&&(i.xaxes[1]=a.extend(!0,{},i.xaxis,i.x2axis),i.xaxes[1].position="top",null==i.x2axis.min&&(i.xaxes[1].min=null),null==i.x2axis.max&&(i.xaxes[1].max=null)),i.y2axis&&(i.yaxes[1]=a.extend(!0,{},i.yaxis,i.y2axis),i.yaxes[1].position="right",null==i.y2axis.min&&(i.yaxes[1].min=null),null==i.y2axis.max&&(i.yaxes[1].max=null)),i.grid.coloredAreas&&(i.grid.markings=i.grid.coloredAreas),i.grid.coloredAreasColor&&(i.grid.markingsColor=i.grid.coloredAreasColor),i.lines&&a.extend(!0,i.series.lines,i.lines),i.points&&a.extend(!0,i.series.points,i.points),i.bars&&a.extend(!0,i.series.bars,i.bars),null!=i.shadowSize&&(i.series.shadowSize=i.shadowSize),null!=i.highlightColor&&(i.series.highlightColor=i.highlightColor),d=0;d<i.xaxes.length;++d)E(o,d+1).options=i.xaxes[d];for(d=0;d<i.yaxes.length;++d)E(p,d+1).options=i.yaxes[d];for(var k in t)i.hooks[k]&&i.hooks[k].length&&(t[k]=t[k].concat(i.hooks[k]));v(t.processOptions,[i])}function y(a){h=z(a),F(),G()}function z(b){for(var c=[],d=0;d<b.length;++d){var e=a.extend(!0,{},i.series);null!=b[d].data?(e.data=b[d].data,delete b[d].data,a.extend(!0,e,b[d]),b[d].data=e.data):e.data=b[d],c.push(e)}return c}function A(a,b){var c=a[b+"axis"];return"object"==typeof c&&(c=c.n),"number"!=typeof c&&(c=1),c}function B(){return a.grep(o.concat(p),function(a){return a})}function C(a){var c,d,b={};for(c=0;c<o.length;++c)d=o[c],d&&d.used&&(b["x"+d.n]=d.c2p(a.left));for(c=0;c<p.length;++c)d=p[c],d&&d.used&&(b["y"+d.n]=d.c2p(a.top));return void 0!==b.x1&&(b.x=b.x1),void 0!==b.y1&&(b.y=b.y1),b}function D(a){var c,d,e,b={};for(c=0;c<o.length;++c)if(d=o[c],d&&d.used&&(e="x"+d.n,null==a[e]&&1==d.n&&(e="x"),null!=a[e])){b.left=d.p2c(a[e]);break}for(c=0;c<p.length;++c)if(d=p[c],d&&d.used&&(e="y"+d.n,null==a[e]&&1==d.n&&(e="y"),null!=a[e])){b.top=d.p2c(a[e]);break}return b}function E(b,c){return b[c-1]||(b[c-1]={n:c,direction:b==o?"x":"y",options:a.extend(!0,{},b==o?i.xaxis:i.yaxis)}),b[c-1]}function F(){var d,b=h.length,c=-1;for(d=0;d<h.length;++d){var e=h[d].color;null!=e&&(b--,"number"==typeof e&&e>c&&(c=e))}b<=c&&(b=c+1);var f,g=[],j=i.colors,k=j.length,l=0;for(d=0;d<b;d++)f=a.color.parse(j[d%k]||"#666"),d%k==0&&d&&(l=l>=0?l<.5?-l-.2:0:-l),g[d]=f.scale("rgb",1+l);var n,m=0;for(d=0;d<h.length;++d){if(n=h[d],null==n.color?(n.color=g[m].toString(),++m):"number"==typeof n.color&&(n.color=g[n.color].toString()),null==n.lines.show){var q,r=!0;for(q in n)if(n[q]&&n[q].show){r=!1;break}r&&(n.lines.show=!0)}null==n.lines.zero&&(n.lines.zero=!!n.lines.fill),n.xaxis=E(o,A(n,"x")),n.yaxis=E(p,A(n,"y"))}}function G(){function x(a,b,c){b<a.datamin&&b!=-d&&(a.datamin=b),c>a.datamax&&c!=d&&(a.datamax=c)}var e,f,g,i,k,l,m,q,r,s,u,w,b=Number.POSITIVE_INFINITY,c=Number.NEGATIVE_INFINITY,d=Number.MAX_VALUE;for(a.each(B(),function(a,d){d.datamin=b,d.datamax=c,d.used=!1}),e=0;e<h.length;++e)k=h[e],k.datapoints={points:[]},v(t.processRawData,[k,k.data,k.datapoints]);for(e=0;e<h.length;++e){if(k=h[e],u=k.data,w=k.datapoints.format,!w){if(w=[],w.push({x:!0,number:!0,required:!0}),w.push({y:!0,number:!0,required:!0}),k.bars.show||k.lines.show&&k.lines.fill){var y=!!(k.bars.show&&k.bars.zero||k.lines.show&&k.lines.zero);w.push({y:!0,number:!0,required:!1,defaultValue:0,autoscale:y}),k.bars.horizontal&&(delete w[w.length-1].y,w[w.length-1].x=!0)}k.datapoints.format=w}if(null==k.datapoints.pointsize){k.datapoints.pointsize=w.length,m=k.datapoints.pointsize,l=k.datapoints.points;var z=k.lines.show&&k.lines.steps;for(k.xaxis.used=k.yaxis.used=!0,f=g=0;f<u.length;++f,g+=m){s=u[f];var A=null==s;if(!A)for(i=0;i<m;++i)q=s[i],r=w[i],r&&(r.number&&null!=q&&(q=+q,isNaN(q)?q=null:q==1/0?q=d:q==-(1/0)&&(q=-d)),null==q&&(r.required&&(A=!0),null!=r.defaultValue&&(q=r.defaultValue))),l[g+i]=q;if(A)for(i=0;i<m;++i)q=l[g+i],null!=q&&(r=w[i],r.autoscale!==!1&&(r.x&&x(k.xaxis,q,q),r.y&&x(k.yaxis,q,q))),l[g+i]=null;else if(z&&g>0&&null!=l[g-m]&&l[g-m]!=l[g]&&l[g-m+1]!=l[g+1]){for(i=0;i<m;++i)l[g+m+i]=l[g+i];l[g+1]=l[g-m+1],g+=m}}}}for(e=0;e<h.length;++e)k=h[e],v(t.processDatapoints,[k,k.datapoints]);for(e=0;e<h.length;++e){k=h[e],l=k.datapoints.points,m=k.datapoints.pointsize,w=k.datapoints.format;var C=b,D=b,E=c,F=c;for(f=0;f<l.length;f+=m)if(null!=l[f])for(i=0;i<m;++i)q=l[f+i],r=w[i],r&&r.autoscale!==!1&&q!=d&&q!=-d&&(r.x&&(q<C&&(C=q),q>E&&(E=q)),r.y&&(q<D&&(D=q),q>F&&(F=q)));if(k.bars.show){var G;switch(k.bars.align){case"left":G=0;break;case"right":G=-k.bars.barWidth;break;default:G=-k.bars.barWidth/2}k.bars.horizontal?(D+=G,F+=G+k.bars.barWidth):(C+=G,E+=G+k.bars.barWidth)}x(k.xaxis,C,E),x(k.yaxis,D,F)}a.each(B(),function(a,d){d.datamin==b&&(d.datamin=null),d.datamax==c&&(d.datamax=null)})}function H(){b.css("padding",0).children().filter(function(){return!a(this).hasClass("flot-overlay")&&!a(this).hasClass("flot-base")}).remove(),"static"==b.css("position")&&b.css("position","relative"),j=new c("flot-base",b),k=new c("flot-overlay",b),m=j.context,n=k.context,l=a(k.element).unbind();var d=b.data("plot");d&&(d.shutdown(),k.clear()),b.data("plot",u)}function I(){i.grid.hoverable&&(l.mousemove(ha),l.bind("mouseleave",ia)),i.grid.clickable&&l.click(ja),v(t.bindEvents,[l])}function J(){fa&&clearTimeout(fa),l.unbind("mousemove",ha),l.unbind("mouseleave",ia),l.unbind("click",ja),v(t.shutdown,[l])}function K(a){function b(a){return a}var c,d,e=a.options.transform||b,f=a.options.inverseTransform;"x"==a.direction?(c=a.scale=r/Math.abs(e(a.max)-e(a.min)),d=Math.min(e(a.max),e(a.min))):(c=a.scale=s/Math.abs(e(a.max)-e(a.min)),c=-c,d=Math.max(e(a.max),e(a.min))),e==b?a.p2c=function(a){return(a-d)*c}:a.p2c=function(a){return(e(a)-d)*c},f?a.c2p=function(a){return f(d+a/c)}:a.c2p=function(a){return d+a/c}}function L(a){for(var b=a.options,c=a.ticks||[],d=b.labelWidth||0,e=b.labelHeight||0,f=d||("x"==a.direction?Math.floor(j.width/(c.length||1)):null),g=a.direction+"Axis "+a.direction+a.n+"Axis",h="flot-"+a.direction+"-axis flot-"+a.direction+a.n+"-axis "+g,i=b.font||"flot-tick-label tickLabel",k=0;k<c.length;++k){var l=c[k];if(l.label){var m=j.getTextInfo(h,l.label,i,null,f);d=Math.max(d,m.width),e=Math.max(e,m.height)}}a.labelWidth=b.labelWidth||d,a.labelHeight=b.labelHeight||e}function M(b){var c=b.labelWidth,d=b.labelHeight,e=b.options.position,f="x"===b.direction,g=b.options.tickLength,h=i.grid.axisMargin,k=i.grid.labelMargin,l=!0,m=!0,n=!0,r=!1;a.each(f?o:p,function(a,c){c&&(c.show||c.reserveSpace)&&(c===b?r=!0:c.options.position===e&&(r?m=!1:l=!1),r||(n=!1))}),m&&(h=0),null==g&&(g=n?"full":5),isNaN(+g)||(k+=+g),f?(d+=k,"bottom"==e?(q.bottom+=d+h,b.box={top:j.height-q.bottom,height:d}):(b.box={top:q.top+h,height:d},q.top+=d+h)):(c+=k,"left"==e?(b.box={left:q.left+h,width:c},q.left+=c+h):(q.right+=c+h,b.box={left:j.width-q.right,width:c})),b.position=e,b.tickLength=g,b.box.padding=k,b.innermost=l}function N(a){"x"==a.direction?(a.box.left=q.left-a.labelWidth/2,a.box.width=j.width-q.left-q.right+a.labelWidth):(a.box.top=q.top-a.labelHeight/2,a.box.height=j.height-q.bottom-q.top+a.labelHeight)}function O(){var d,b=i.grid.minBorderMargin;if(null==b)for(b=0,d=0;d<h.length;++d)b=Math.max(b,2*(h[d].points.radius+h[d].points.lineWidth/2));var e={left:b,right:b,top:b,bottom:b};a.each(B(),function(a,b){b.reserveSpace&&b.ticks&&b.ticks.length&&("x"===b.direction?(e.left=Math.max(e.left,b.labelWidth/2),e.right=Math.max(e.right,b.labelWidth/2)):(e.bottom=Math.max(e.bottom,b.labelHeight/2),e.top=Math.max(e.top,b.labelHeight/2)))}),q.left=Math.ceil(Math.max(e.left,q.left)),q.right=Math.ceil(Math.max(e.right,q.right)),q.top=Math.ceil(Math.max(e.top,q.top)),q.bottom=Math.ceil(Math.max(e.bottom,q.bottom))}function P(){var b,c=B(),d=i.grid.show;for(var e in q){var f=i.grid.margin||0;q[e]="number"==typeof f?f:f[e]||0}v(t.processOffset,[q]);for(var e in q)"object"==typeof i.grid.borderWidth?q[e]+=d?i.grid.borderWidth[e]:0:q[e]+=d?i.grid.borderWidth:0;if(a.each(c,function(a,b){var c=b.options;b.show=null==c.show?b.used:c.show,b.reserveSpace=null==c.reserveSpace?b.show:c.reserveSpace,Q(b)}),d){var g=a.grep(c,function(a){return a.show||a.reserveSpace});for(a.each(g,function(a,b){R(b),S(b),T(b,b.ticks),L(b)}),b=g.length-1;b>=0;--b)M(g[b]);O(),a.each(g,function(a,b){N(b)})}r=j.width-q.left-q.right,s=j.height-q.bottom-q.top,a.each(c,function(a,b){K(b)}),d&&Y(),da()}function Q(a){var b=a.options,c=+(null!=b.min?b.min:a.datamin),d=+(null!=b.max?b.max:a.datamax),e=d-c;if(0==e){var f=0==d?1:.01;null==b.min&&(c-=f),null!=b.max&&null==b.min||(d+=f)}else{var g=b.autoscaleMargin;null!=g&&(null==b.min&&(c-=e*g,c<0&&null!=a.datamin&&a.datamin>=0&&(c=0)),null==b.max&&(d+=e*g,d>0&&null!=a.datamax&&a.datamax<=0&&(d=0)))}a.min=c,a.max=d}function R(b){var d,c=b.options;d="number"==typeof c.ticks&&c.ticks>0?c.ticks:.3*Math.sqrt("x"==b.direction?j.width:j.height);var f=(b.max-b.min)/d,g=-Math.floor(Math.log(f)/Math.LN10),h=c.tickDecimals;null!=h&&g>h&&(g=h);var l,i=Math.pow(10,-g),k=f/i;if(k<1.5?l=1:k<3?(l=2,k>2.25&&(null==h||g+1<=h)&&(l=2.5,++g)):l=k<7.5?5:10,l*=i,null!=c.minTickSize&&l<c.minTickSize&&(l=c.minTickSize),b.delta=f,b.tickDecimals=Math.max(0,null!=h?h:g),b.tickSize=c.tickSize||l,"time"==c.mode&&!b.tickGenerator)throw new Error("Time mode requires the flot.time plugin.");if(b.tickGenerator||(b.tickGenerator=function(a){var g,b=[],c=e(a.min,a.tickSize),d=0,f=Number.NaN;do g=f,f=c+d*a.tickSize,b.push(f),++d;while(f<a.max&&f!=g);return b},b.tickFormatter=function(a,b){var c=b.tickDecimals?Math.pow(10,b.tickDecimals):1,d=""+Math.round(a*c)/c;if(null!=b.tickDecimals){var e=d.indexOf("."),f=e==-1?0:d.length-e-1;if(f<b.tickDecimals)return(f?d:d+".")+(""+c).substr(1,b.tickDecimals-f)}return d}),a.isFunction(c.tickFormatter)&&(b.tickFormatter=function(a,b){return""+c.tickFormatter(a,b)}),null!=c.alignTicksWithAxis){var m=("x"==b.direction?o:p)[c.alignTicksWithAxis-1];if(m&&m.used&&m!=b){var n=b.tickGenerator(b);if(n.length>0&&(null==c.min&&(b.min=Math.min(b.min,n[0])),null==c.max&&n.length>1&&(b.max=Math.max(b.max,n[n.length-1]))),b.tickGenerator=function(a){var c,d,b=[];for(d=0;d<m.ticks.length;++d)c=(m.ticks[d].v-m.min)/(m.max-m.min),c=a.min+c*(a.max-a.min),b.push(c);return b},!b.mode&&null==c.tickDecimals){var q=Math.max(0,-Math.floor(Math.log(b.delta)/Math.LN10)+1),r=b.tickGenerator(b);r.length>1&&/\..*0$/.test((r[1]-r[0]).toFixed(q))||(b.tickDecimals=q)}}}}function S(b){var c=b.options.ticks,d=[];null==c||"number"==typeof c&&c>0?d=b.tickGenerator(b):c&&(d=a.isFunction(c)?c(b):c);var e,f;for(b.ticks=[],e=0;e<d.length;++e){var g=null,h=d[e];"object"==typeof h?(f=+h[0],h.length>1&&(g=h[1])):f=+h,null==g&&(g=b.tickFormatter(f,b)),isNaN(f)||b.ticks.push({v:f,label:g})}}function T(a,b){a.options.autoscaleMargin&&b.length>0&&(null==a.options.min&&(a.min=Math.min(a.min,b[0].v)),null==a.options.max&&b.length>1&&(a.max=Math.max(a.max,b[b.length-1].v)))}function U(){j.clear(),v(t.drawBackground,[m]);var a=i.grid;a.show&&a.backgroundColor&&W(),a.show&&!a.aboveData&&X();for(var b=0;b<h.length;++b)v(t.drawSeries,[m,h[b]]),Z(h[b]);v(t.draw,[m]),a.show&&a.aboveData&&X(),j.render(),la()}function V(a,b){for(var c,d,e,f,g=B(),h=0;h<g.length;++h)if(c=g[h],c.direction==b&&(f=b+c.n+"axis",a[f]||1!=c.n||(f=b+"axis"),a[f])){d=a[f].from,e=a[f].to;break}if(a[f]||(c="x"==b?o[0]:p[0],d=a[b+"1"],e=a[b+"2"]),null!=d&&null!=e&&d>e){var i=d;d=e,e=i}return{from:d,to:e,axis:c}}function W(){m.save(),m.translate(q.left,q.top),m.fillStyle=sa(i.grid.backgroundColor,s,0,"rgba(255, 255, 255, 0)"),m.fillRect(0,0,r,s),m.restore()}function X(){var b,c,d,e;m.save(),m.translate(q.left,q.top);var f=i.grid.markings;if(f)for(a.isFunction(f)&&(c=u.getAxes(),c.xmin=c.xaxis.min,c.xmax=c.xaxis.max,c.ymin=c.yaxis.min,c.ymax=c.yaxis.max,f=f(c)),b=0;b<f.length;++b){var g=f[b],h=V(g,"x"),j=V(g,"y");if(null==h.from&&(h.from=h.axis.min),null==h.to&&(h.to=h.axis.max),null==j.from&&(j.from=j.axis.min),null==j.to&&(j.to=j.axis.max),!(h.to<h.axis.min||h.from>h.axis.max||j.to<j.axis.min||j.from>j.axis.max)){h.from=Math.max(h.from,h.axis.min),h.to=Math.min(h.to,h.axis.max),j.from=Math.max(j.from,j.axis.min),j.to=Math.min(j.to,j.axis.max);var k=h.from===h.to,l=j.from===j.to;if(!k||!l)if(h.from=Math.floor(h.axis.p2c(h.from)),h.to=Math.floor(h.axis.p2c(h.to)),j.from=Math.floor(j.axis.p2c(j.from)),j.to=Math.floor(j.axis.p2c(j.to)),k||l){var n=g.lineWidth||i.grid.markingsLineWidth,o=n%2?.5:0;m.beginPath(),m.strokeStyle=g.color||i.grid.markingsColor,m.lineWidth=n,k?(m.moveTo(h.to+o,j.from),m.lineTo(h.to+o,j.to)):(m.moveTo(h.from,j.to+o),m.lineTo(h.to,j.to+o)),m.stroke()}else m.fillStyle=g.color||i.grid.markingsColor,m.fillRect(h.from,j.to,h.to-h.from,j.from-j.to)}}c=B(),d=i.grid.borderWidth;for(var p=0;p<c.length;++p){var x,y,z,A,t=c[p],v=t.box,w=t.tickLength;if(t.show&&0!=t.ticks.length){for(m.lineWidth=1,"x"==t.direction?(x=0,y="full"==w?"top"==t.position?0:s:v.top-q.top+("top"==t.position?v.height:0)):(y=0,x="full"==w?"left"==t.position?0:r:v.left-q.left+("left"==t.position?v.width:0)),t.innermost||(m.strokeStyle=t.options.color,m.beginPath(),z=A=0,"x"==t.direction?z=r+1:A=s+1,1==m.lineWidth&&("x"==t.direction?y=Math.floor(y)+.5:x=Math.floor(x)+.5),m.moveTo(x,y),m.lineTo(x+z,y+A),m.stroke()),m.strokeStyle=t.options.tickColor,m.beginPath(),b=0;b<t.ticks.length;++b){var C=t.ticks[b].v;z=A=0,isNaN(C)||C<t.min||C>t.max||"full"==w&&("object"==typeof d&&d[t.position]>0||d>0)&&(C==t.min||C==t.max)||("x"==t.direction?(x=t.p2c(C),A="full"==w?-s:w,"top"==t.position&&(A=-A)):(y=t.p2c(C),z="full"==w?-r:w,"left"==t.position&&(z=-z)),1==m.lineWidth&&("x"==t.direction?x=Math.floor(x)+.5:y=Math.floor(y)+.5),m.moveTo(x,y),m.lineTo(x+z,y+A))}m.stroke()}}d&&(e=i.grid.borderColor,"object"==typeof d||"object"==typeof e?("object"!=typeof d&&(d={top:d,right:d,bottom:d,left:d}),"object"!=typeof e&&(e={top:e,right:e,bottom:e,left:e}),d.top>0&&(m.strokeStyle=e.top,m.lineWidth=d.top,m.beginPath(),m.moveTo(0-d.left,0-d.top/2),m.lineTo(r,0-d.top/2),m.stroke()),d.right>0&&(m.strokeStyle=e.right,m.lineWidth=d.right,m.beginPath(),m.moveTo(r+d.right/2,0-d.top),m.lineTo(r+d.right/2,s),m.stroke()),d.bottom>0&&(m.strokeStyle=e.bottom,m.lineWidth=d.bottom,m.beginPath(),m.moveTo(r+d.right,s+d.bottom/2),m.lineTo(0,s+d.bottom/2),m.stroke()),d.left>0&&(m.strokeStyle=e.left,m.lineWidth=d.left,m.beginPath(),m.moveTo(0-d.left/2,s+d.bottom),m.lineTo(0-d.left/2,0),m.stroke())):(m.lineWidth=d,m.strokeStyle=i.grid.borderColor,m.strokeRect(-d/2,-d/2,r+d,s+d))),m.restore()}function Y(){a.each(B(),function(a,b){var g,h,i,k,l,c=b.box,d=b.direction+"Axis "+b.direction+b.n+"Axis",e="flot-"+b.direction+"-axis flot-"+b.direction+b.n+"-axis "+d,f=b.options.font||"flot-tick-label tickLabel";if(j.removeText(e),b.show&&0!=b.ticks.length)for(var m=0;m<b.ticks.length;++m)g=b.ticks[m],!g.label||g.v<b.min||g.v>b.max||("x"==b.direction?(k="center",h=q.left+b.p2c(g.v),"bottom"==b.position?i=c.top+c.padding:(i=c.top+c.height-c.padding,l="bottom")):(l="middle",i=q.top+b.p2c(g.v),"left"==b.position?(h=c.left+c.width-c.padding,k="right"):h=c.left+c.padding),j.addText(e,h,i,g.label,f,null,null,k,l))})}function Z(a){a.lines.show&&$(a),a.bars.show&&ba(a),a.points.show&&_(a)}function $(a){function b(a,b,c,d,e){var f=a.points,g=a.pointsize,h=null,i=null;m.beginPath();for(var j=g;j<f.length;j+=g){var k=f[j-g],l=f[j-g+1],n=f[j],o=f[j+1];if(null!=k&&null!=n){if(l<=o&&l<e.min){if(o<e.min)continue;k=(e.min-l)/(o-l)*(n-k)+k,l=e.min}else if(o<=l&&o<e.min){if(l<e.min)continue;n=(e.min-l)/(o-l)*(n-k)+k,o=e.min}if(l>=o&&l>e.max){if(o>e.max)continue;k=(e.max-l)/(o-l)*(n-k)+k,l=e.max}else if(o>=l&&o>e.max){if(l>e.max)continue;n=(e.max-l)/(o-l)*(n-k)+k,o=e.max}if(k<=n&&k<d.min){if(n<d.min)continue;l=(d.min-k)/(n-k)*(o-l)+l,k=d.min}else if(n<=k&&n<d.min){if(k<d.min)continue;o=(d.min-k)/(n-k)*(o-l)+l,n=d.min}if(k>=n&&k>d.max){if(n>d.max)continue;l=(d.max-k)/(n-k)*(o-l)+l,k=d.max}else if(n>=k&&n>d.max){if(k>d.max)continue;o=(d.max-k)/(n-k)*(o-l)+l,n=d.max}k==h&&l==i||m.moveTo(d.p2c(k)+b,e.p2c(l)+c),h=n,i=o,m.lineTo(d.p2c(n)+b,e.p2c(o)+c)}}m.stroke()}function c(a,b,c){for(var d=a.points,e=a.pointsize,f=Math.min(Math.max(0,c.min),c.max),g=0,i=!1,j=1,k=0,l=0;;){if(e>0&&g>d.length+e)break;g+=e;var n=d[g-e],o=d[g-e+j],p=d[g],q=d[g+j];if(i){if(e>0&&null!=n&&null==p){l=g,e=-e,j=2;continue}if(e<0&&g==k+e){m.fill(),i=!1,e=-e,j=1,g=k=l+e;continue}}if(null!=n&&null!=p){if(n<=p&&n<b.min){if(p<b.min)continue;o=(b.min-n)/(p-n)*(q-o)+o,n=b.min}else if(p<=n&&p<b.min){if(n<b.min)continue;q=(b.min-n)/(p-n)*(q-o)+o,p=b.min}if(n>=p&&n>b.max){if(p>b.max)continue;o=(b.max-n)/(p-n)*(q-o)+o,n=b.max}else if(p>=n&&p>b.max){if(n>b.max)continue;q=(b.max-n)/(p-n)*(q-o)+o,p=b.max}if(i||(m.beginPath(),m.moveTo(b.p2c(n),c.p2c(f)),i=!0),o>=c.max&&q>=c.max)m.lineTo(b.p2c(n),c.p2c(c.max)),m.lineTo(b.p2c(p),c.p2c(c.max));else if(o<=c.min&&q<=c.min)m.lineTo(b.p2c(n),c.p2c(c.min)),m.lineTo(b.p2c(p),c.p2c(c.min));else{var r=n,s=p;o<=q&&o<c.min&&q>=c.min?(n=(c.min-o)/(q-o)*(p-n)+n,o=c.min):q<=o&&q<c.min&&o>=c.min&&(p=(c.min-o)/(q-o)*(p-n)+n,q=c.min),o>=q&&o>c.max&&q<=c.max?(n=(c.max-o)/(q-o)*(p-n)+n,o=c.max):q>=o&&q>c.max&&o<=c.max&&(p=(c.max-o)/(q-o)*(p-n)+n,q=c.max),n!=r&&m.lineTo(b.p2c(r),c.p2c(o)),m.lineTo(b.p2c(n),c.p2c(o)),m.lineTo(b.p2c(p),c.p2c(q)),p!=s&&(m.lineTo(b.p2c(p),c.p2c(q)),m.lineTo(b.p2c(s),c.p2c(q)))}}}}m.save(),m.translate(q.left,q.top),m.lineJoin="round";var d=a.lines.lineWidth,e=a.shadowSize;if(d>0&&e>0){m.lineWidth=e,m.strokeStyle="rgba(0,0,0,0.0)";var f=Math.PI/18;b(a.datapoints,Math.sin(f)*(d/2+e/2),Math.cos(f)*(d/2+e/2),a.xaxis,a.yaxis),m.lineWidth=e/2,b(a.datapoints,Math.sin(f)*(d/2+e/4),Math.cos(f)*(d/2+e/4),a.xaxis,a.yaxis)}m.lineWidth=d,m.strokeStyle=a.color;var g=ca(a.lines,a.color,0,s);g&&(m.fillStyle=g,c(a.datapoints,a.xaxis,a.yaxis)),d>0&&b(a.datapoints,0,0,a.xaxis,a.yaxis),m.restore()}function _(a){function b(a,b,c,d,e,f,g,h){for(var i=a.points,j=a.pointsize,k=0;k<i.length;k+=j){var l=i[k],n=i[k+1];null==l||l<f.min||l>f.max||n<g.min||n>g.max||(m.beginPath(),l=f.p2c(l),n=g.p2c(n)+d,"circle"==h?m.arc(l,n,b,0,e?Math.PI:2*Math.PI,!1):h(m,l,n,b,e),m.closePath(),c&&(m.fillStyle=c,m.fill()),m.stroke())}}m.save(),m.translate(q.left,q.top);var c=a.points.lineWidth,d=a.shadowSize,e=a.points.radius,f=a.points.symbol;if(0==c&&(c=1e-4),c>0&&d>0){var g=d/2;m.lineWidth=g,m.strokeStyle="rgba(0,0,0,0.1)",b(a.datapoints,e,null,g+g/2,!0,a.xaxis,a.yaxis,f),m.strokeStyle="rgba(0,0,0,0.2)",b(a.datapoints,e,null,g/2,!0,a.xaxis,a.yaxis,f)}m.lineWidth=c,m.strokeStyle=a.color,b(a.datapoints,e,ca(a.points,a.color),0,!1,a.xaxis,a.yaxis,f),m.restore()}function aa(a,b,c,d,e,f,g,h,i,j,k){var l,m,n,o,p,q,r,s,t;j?(s=q=r=!0,p=!1,l=c,m=a,o=b+d,n=b+e,m<l&&(t=m,m=l,l=t,p=!0,q=!1)):(p=q=r=!0,s=!1,l=a+d,m=a+e,n=c,o=b,o<n&&(t=o,o=n,n=t,s=!0,r=!1)),m<g.min||l>g.max||o<h.min||n>h.max||(l<g.min&&(l=g.min,p=!1),m>g.max&&(m=g.max,q=!1),n<h.min&&(n=h.min,s=!1),o>h.max&&(o=h.max,r=!1),l=g.p2c(l),n=h.p2c(n),m=g.p2c(m),o=h.p2c(o),f&&(i.fillStyle=f(n,o),i.fillRect(l,o,m-l,n-o)),k>0&&(p||q||r||s)&&(i.beginPath(),i.moveTo(l,n),p?i.lineTo(l,o):i.moveTo(l,o),r?i.lineTo(m,o):i.moveTo(m,o),q?i.lineTo(m,n):i.moveTo(m,n),s?i.lineTo(l,n):i.moveTo(l,n),i.stroke()))}function ba(a){function b(b,c,d,e,f,g){for(var h=b.points,i=b.pointsize,j=0;j<h.length;j+=i)null!=h[j]&&aa(h[j],h[j+1],h[j+2],c,d,e,f,g,m,a.bars.horizontal,a.bars.lineWidth)}m.save(),m.translate(q.left,q.top),m.lineWidth=a.bars.lineWidth,m.strokeStyle=a.color;var c;switch(a.bars.align){case"left":c=0;break;case"right":c=-a.bars.barWidth;break;default:c=-a.bars.barWidth/2}var d=a.bars.fill?function(b,c){return ca(a.bars,a.color,b,c)}:null;b(a.datapoints,c,c+a.bars.barWidth,d,a.xaxis,a.yaxis),m.restore()}function ca(b,c,d,e){var f=b.fill;if(!f)return null;if(b.fillColor)return sa(b.fillColor,d,e,c);var g=a.color.parse(c);return g.a="number"==typeof f?f:.4,g.normalize(),g.toString()}function da(){if(null!=i.legend.container?a(i.legend.container).html(""):b.find(".legend").remove(),i.legend.show){for(var g,j,c=[],d=[],e=!1,f=i.legend.labelFormatter,k=0;k<h.length;++k)g=h[k],g.label&&(j=f?f(g.label,g):g.label,j&&d.push({label:j,color:g.color}));if(i.legend.sorted)if(a.isFunction(i.legend.sorted))d.sort(i.legend.sorted);else if("reverse"==i.legend.sorted)d.reverse();else{var l="descending"!=i.legend.sorted;d.sort(function(a,b){return a.label==b.label?0:a.label<b.label!=l?1:-1})}for(var k=0;k<d.length;++k){var m=d[k];k%i.legend.noColumns==0&&(e&&c.push("</tr>"),c.push("<tr>"),e=!0),c.push('<td class="legendColorBox"><div style="border:1px solid; margin:5px; '+i.legend.labelBoxBorderColor+';padding:1px"><div style="width:4px;height:0;border:5px solid '+m.color+';overflow:hidden"></div></div></td><td class="legendLabel">'+m.label+"</td>")}if(e&&c.push("</tr>"),0!=c.length){var n='<table style="font-size:smaller;color:'+i.grid.color+'">'+c.join("")+"</table>";if(null!=i.legend.container)a(i.legend.container).html(n);else{var o="",p=i.legend.position,r=i.legend.margin;null==r[0]&&(r=[r,r]),"n"==p.charAt(0)?o+="top:"+(r[1]+q.top)+"px;":"s"==p.charAt(0)&&(o+="bottom:"+(r[1]+q.bottom)+"px;"),"e"==p.charAt(1)?o+="right:"+(r[0]+q.right)+"px;":"w"==p.charAt(1)&&(o+="left:"+(r[0]+q.left)+"px;");var s=a('<div class="legend">'+n.replace('style="','style="position:absolute;'+o+";")+"</div>").appendTo(b);if(0!=i.legend.backgroundOpacity){var t=i.legend.backgroundColor;null==t&&(t=i.grid.backgroundColor,t=t&&"string"==typeof t?a.color.parse(t):a.color.extract(s,"background-color"),t.a=1,t=t.toString());var u=s.children();a('<div style="position:absolute;width:'+u.width()+"px;height:"+u.height()+"px;"+o+"background-color:"+t+';"> </div>').prependTo(s).css("opacity",i.legend.backgroundOpacity)}}}}}function ga(a,b,c){var j,k,l,d=i.grid.mouseActiveRadius,e=d*d+1,f=null;for(j=h.length-1;j>=0;--j)if(c(h[j])){var m=h[j],n=m.xaxis,o=m.yaxis,p=m.datapoints.points,q=n.c2p(a),r=o.c2p(b),s=d/n.scale,t=d/o.scale;if(l=m.datapoints.pointsize,n.options.inverseTransform&&(s=Number.MAX_VALUE),o.options.inverseTransform&&(t=Number.MAX_VALUE),m.lines.show||m.points.show)for(k=0;k<p.length;k+=l){var u=p[k],v=p[k+1];if(null!=u&&!(u-q>s||u-q<-s||v-r>t||v-r<-t)){var w=Math.abs(n.p2c(u)-a),x=Math.abs(o.p2c(v)-b),y=w*w+x*x;y<e&&(e=y,f=[j,k/l])}}if(m.bars.show&&!f){var z,A;switch(m.bars.align){case"left":z=0;break;case"right":z=-m.bars.barWidth;break;default:z=-m.bars.barWidth/2}for(A=z+m.bars.barWidth,k=0;k<p.length;k+=l){var u=p[k],v=p[k+1],B=p[k+2];null!=u&&(h[j].bars.horizontal?q<=Math.max(B,u)&&q>=Math.min(B,u)&&r>=v+z&&r<=v+A:q>=u+z&&q<=u+A&&r>=Math.min(B,v)&&r<=Math.max(B,v))&&(f=[j,k/l])}}}return f?(j=f[0],k=f[1],l=h[j].datapoints.pointsize,{datapoint:h[j].datapoints.points.slice(k*l,(k+1)*l),dataIndex:k,series:h[j],seriesIndex:j}):null}function ha(a){i.grid.hoverable&&ka("plothover",a,function(a){return 0!=a.hoverable})}function ia(a){i.grid.hoverable&&ka("plothover",a,function(a){return!1})}function ja(a){ka("plotclick",a,function(a){return 0!=a.clickable})}function ka(a,c,d){var e=l.offset(),f=c.pageX-e.left-q.left,g=c.pageY-e.top-q.top,h=C({left:f,top:g});h.pageX=c.pageX,h.pageY=c.pageY;var j=ga(f,g,d);if(j&&(j.pageX=parseInt(j.series.xaxis.p2c(j.datapoint[0])+e.left+q.left,10),j.pageY=parseInt(j.series.yaxis.p2c(j.datapoint[1])+e.top+q.top,10)),i.grid.autoHighlight){for(var k=0;k<ea.length;++k){var m=ea[k];m.auto!=a||j&&m.series==j.series&&m.point[0]==j.datapoint[0]&&m.point[1]==j.datapoint[1]||oa(m.series,m.point)}j&&na(j.series,j.datapoint,a)}b.trigger(a,[h,j])}function la(){var a=i.interaction.redrawOverlayInterval;return a==-1?void ma():void(fa||(fa=setTimeout(ma,a)))}function ma(){fa=null,n.save(),k.clear(),n.translate(q.left,q.top);var a,b;for(a=0;a<ea.length;++a)b=ea[a],b.series.bars.show?ra(b.series,b.point):qa(b.series,b.point);n.restore(),v(t.drawOverlay,[n])}function na(a,b,c){if("number"==typeof a&&(a=h[a]),"number"==typeof b){var d=a.datapoints.pointsize;b=a.datapoints.points.slice(d*b,d*(b+1))}var e=pa(a,b);e==-1?(ea.push({series:a,point:b,auto:c}),la()):c||(ea[e].auto=!1)}function oa(a,b){if(null==a&&null==b)return ea=[],void la();if("number"==typeof a&&(a=h[a]),"number"==typeof b){var c=a.datapoints.pointsize;b=a.datapoints.points.slice(c*b,c*(b+1))}var d=pa(a,b);d!=-1&&(ea.splice(d,1),la())}function pa(a,b){for(var c=0;c<ea.length;++c){var d=ea[c];if(d.series==a&&d.point[0]==b[0]&&d.point[1]==b[1])return c}return-1}function qa(b,c){var d=c[0],e=c[1],f=b.xaxis,g=b.yaxis,h="string"==typeof b.highlightColor?b.highlightColor:a.color.parse(b.color).scale("a",.5).toString();if(!(d<f.min||d>f.max||e<g.min||e>g.max)){var i=b.points.radius+b.points.lineWidth/2;n.lineWidth=i,n.strokeStyle=h;var j=1.5*i;d=f.p2c(d),e=g.p2c(e),n.beginPath(),"circle"==b.points.symbol?n.arc(d,e,j,0,2*Math.PI,!1):b.points.symbol(n,d,e,j,!1),n.closePath(),n.stroke()}}function ra(b,c){var f,d="string"==typeof b.highlightColor?b.highlightColor:a.color.parse(b.color).scale("a",.5).toString(),e=d;switch(b.bars.align){case"left":f=0;break;case"right":f=-b.bars.barWidth;break;default:f=-b.bars.barWidth/2}n.lineWidth=b.bars.lineWidth,n.strokeStyle=d,aa(c[0],c[1],c[2]||0,f,f+b.bars.barWidth,function(){return e},b.xaxis,b.yaxis,n,b.bars.horizontal,b.bars.lineWidth)}function sa(b,c,d,e){if("string"==typeof b)return b;for(var f=m.createLinearGradient(0,d,0,c),g=0,h=b.colors.length;g<h;++g){var i=b.colors[g];if("string"!=typeof i){var j=a.color.parse(e);null!=i.brightness&&(j=j.scale("rgb",i.brightness)),null!=i.opacity&&(j.a*=i.opacity),i=j.toString()}f.addColorStop(g/(h-1),i)}return f}var h=[],i={colors:["#399BFF","#afd8f8","#EF4836","#4da74d","#9440ed"],legend:{show:!0,noColumns:1,labelFormatter:null,labelBoxBorderColor:"#ccc",container:null,position:"ne",margin:5,backgroundColor:null,backgroundOpacity:.85,sorted:null},xaxis:{show:null,position:"bottom",mode:null,font:null,color:null,tickColor:null,transform:null,inverseTransform:null,min:null,max:null,autoscaleMargin:null,ticks:null,tickFormatter:null,labelWidth:null,labelHeight:null,reserveSpace:null,tickLength:null,alignTicksWithAxis:null,tickDecimals:null,tickSize:null,minTickSize:null},yaxis:{autoscaleMargin:.02,position:"left"},xaxes:[],yaxes:[],series:{points:{show:!1,radius:3,lineWidth:2,fill:!0,fillColor:"#ffffff",symbol:"circle"},lines:{lineWidth:2,fill:!1,fillColor:null,steps:!1},bars:{show:!1,lineWidth:2,barWidth:1,fill:!0,fillColor:null,align:"left",horizontal:!1,zero:!0},shadowSize:null,highlightColor:null},grid:{show:!0,aboveData:!1,color:"#999",backgroundColor:null,borderColor:null,tickColor:null,margin:0,labelMargin:5,axisMargin:8,borderWidth:0,minBorderMargin:null,markings:null,markingsColor:"#f4f4f4",markingsLineWidth:2,clickable:!1,hoverable:!1,autoHighlight:!0,mouseActiveRadius:10},interaction:{redrawOverlayInterval:1e3/60},hooks:{}},j=null,k=null,l=null,m=null,n=null,o=[],p=[],q={left:0,right:0,top:0,bottom:0},r=0,s=0,t={processOptions:[],processRawData:[],processDatapoints:[],processOffset:[],drawBackground:[],drawSeries:[],draw:[],bindEvents:[],drawOverlay:[],shutdown:[]},u=this;u.setData=y,u.setupGrid=P,u.draw=U,u.getPlaceholder=function(){return b},u.getCanvas=function(){return j.element},u.getPlotOffset=function(){return q},u.width=function(){return r},u.height=function(){return s},u.offset=function(){var a=l.offset();return a.left+=q.left,a.top+=q.top,a},u.getData=function(){return h},u.getAxes=function(){var b={};return a.each(o.concat(p),function(a,c){c&&(b[c.direction+(1!=c.n?c.n:"")+"axis"]=c)}),b},u.getXAxes=function(){return o},u.getYAxes=function(){return p},u.c2p=C,u.p2c=D,u.getOptions=function(){return i},u.highlight=na,u.unhighlight=oa,u.triggerRedrawOverlay=la,u.pointOffset=function(a){return{left:parseInt(o[A(a,"x")-1].p2c(+a.x)+q.left,10),top:parseInt(p[A(a,"y")-1].p2c(+a.y)+q.top,10)}},u.shutdown=J,u.destroy=function(){J(),b.removeData("plot").empty(),h=[],i=null,j=null,k=null,l=null,m=null,n=null,o=[],p=[],t=null,ea=[],u=null},u.resize=function(){var a=b.width(),c=b.height();j.resize(a,c),k.resize(a,c)},u.hooks=t,w(u),x(f),H(),y(d),P(),U(),I();var ea=[],fa=null}function e(a,b){return b*Math.floor(a/b)}var b=Object.prototype.hasOwnProperty;a.fn.detach||(a.fn.detach=function(){return this.each(function(){this.parentNode&&this.parentNode.removeChild(this)})}),c.prototype.resize=function(a,b){if(a<=0||b<=0)throw new Error("Invalid dimensions for plot, width = "+a+", height = "+b);var c=this.element,d=this.context,e=this.pixelRatio;this.width!=a&&(c.width=a*e,c.style.width=a+"px",this.width=a),this.height!=b&&(c.height=b*e,c.style.height=b+"px",this.height=b),d.restore(),d.save(),d.scale(e,e)},c.prototype.clear=function(){this.context.clearRect(0,0,this.width,this.height)},c.prototype.render=function(){var a=this._textCache;for(var c in a)if(b.call(a,c)){var d=this.getTextLayer(c),e=a[c];d.hide();for(var f in e)if(b.call(e,f)){var g=e[f];for(var h in g)if(b.call(g,h)){for(var k,i=g[h].positions,j=0;k=i[j];j++)k.active?k.rendered||(d.append(k.element),k.rendered=!0):(i.splice(j--,1),k.rendered&&k.element.detach());0==i.length&&delete g[h]}}d.show()}},c.prototype.getTextLayer=function(b){var c=this.text[b];return null==c&&(null==this.textContainer&&(this.textContainer=a("<div class='flot-text'></div>").css({position:"absolute",top:0,left:0,bottom:0,right:0,"font-size":"smaller",color:"inherit"}).insertAfter(this.element)),c=this.text[b]=a("<div></div>").addClass(b).css({position:"absolute",top:0,left:0,bottom:0,right:0}).appendTo(this.textContainer)),c},c.prototype.getTextInfo=function(b,c,d,e,f){var g,h,i,j;if(c=""+c,g="object"==typeof d?d.style+" "+d.variant+" "+d.weight+" "+d.size+"px/"+d.lineHeight+"px "+d.family:d,h=this._textCache[b],null==h&&(h=this._textCache[b]={}),i=h[g],null==i&&(i=h[g]={}),j=i[c],null==j){var k=a("<div></div>").html(c).css({position:"absolute","max-width":f,top:-9999}).appendTo(this.getTextLayer(b));"object"==typeof d?k.css({font:g,color:d.color}):"string"==typeof d&&k.addClass(d),j=i[c]={width:k.outerWidth(!0),height:k.outerHeight(!0),element:k,positions:[]},k.detach()}return j},c.prototype.addText=function(a,b,c,d,e,f,g,h,i){var j=this.getTextInfo(a,d,e,f,g),k=j.positions;"center"==h?b-=j.width/2:"right"==h&&(b-=j.width),"middle"==i?c-=j.height/2:"bottom"==i&&(c-=j.height);for(var m,l=0;m=k[l];l++)if(m.x==b&&m.y==c)return void(m.active=!0);m={active:!0,rendered:!1,element:k.length?j.element.clone():j.element,x:b,y:c},k.push(m),m.element.css({top:Math.round(c),left:Math.round(b),"text-align":h})},c.prototype.removeText=function(a,c,d,e,f,g){if(null==e){var h=this._textCache[a];if(null!=h)for(var i in h)if(b.call(h,i)){var j=h[i];for(var k in j)if(b.call(j,k))for(var n,l=j[k].positions,m=0;n=l[m];m++)n.active=!1}}else for(var n,l=this.getTextInfo(a,e,f,g).positions,m=0;n=l[m];m++)n.x==c&&n.y==d&&(n.active=!1)},a.plot=function(b,c,e){var f=new d(a(b),c,e,a.plot.plugins);return f},a.plot.version="0.8.3",a.plot.plugins=[],a.fn.plot=function(b,c){return this.each(function(){a.plot(this,b,c)})}}(jQuery);