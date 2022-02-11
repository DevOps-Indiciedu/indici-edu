!function(t){var e=t(window);function i(){return new Date(Date.UTC.apply(Date,arguments))}var a=function(e,i){this._process_options(i),this.element=t(e),this.isInline=!1,this.isInput=this.element.is("input"),this.component=!!this.element.is(".date")&&this.element.find(".add-on, .btn"),this.hasInput=this.component&&this.element.find("input").length,this.component&&0===this.component.length&&(this.component=!1),this.picker=t(d.template),this._buildEvents(),this._attachEvents(),this.isInline?this.picker.addClass("datepicker-inline").appendTo(this.element):this.picker.addClass("datepicker-dropdown dropdown-menu"),this.o.rtl&&(this.picker.addClass("datepicker-rtl"),this.picker.find(".prev i, .next i").toggleClass("icon-arrow-left icon-arrow-right")),this.viewMode=this.o.startView,this.o.calendarWeeks&&this.picker.find("tfoot th.today").attr("colspan",function(t,e){return parseInt(e)+1}),this._allow_update=!1,this.setStartDate(this._o.startDate),this.setEndDate(this._o.endDate),this.setDaysOfWeekDisabled(this.o.daysOfWeekDisabled),this.fillDow(),this.fillMonths(),this._allow_update=!0,this.update(),this.showMode(),this.isInline&&this.show()};a.prototype={constructor:a,_process_options:function(e){this._o=t.extend({},this._o,e);var i=this.o=t.extend({},this._o),a=i.language;switch(o[a]||(a=a.split("-")[0],o[a]||(a=h.language)),i.language=a,i.startView){case 2:case"decade":i.startView=2;break;case 1:case"year":i.startView=1;break;default:i.startView=0}switch(i.minViewMode){case 1:case"months":i.minViewMode=1;break;case 2:case"years":i.minViewMode=2;break;default:i.minViewMode=0}i.startView=Math.max(i.startView,i.minViewMode),i.weekStart%=7,i.weekEnd=(i.weekStart+6)%7;var s=d.parseFormat(i.format);i.startDate!==-1/0&&(i.startDate?i.startDate instanceof Date?i.startDate=this._local_to_utc(this._zero_time(i.startDate)):i.startDate=d.parseDate(i.startDate,s,i.language):i.startDate=-1/0),i.endDate!==1/0&&(i.endDate?i.endDate instanceof Date?i.endDate=this._local_to_utc(this._zero_time(i.endDate)):i.endDate=d.parseDate(i.endDate,s,i.language):i.endDate=1/0),i.daysOfWeekDisabled=i.daysOfWeekDisabled||[],t.isArray(i.daysOfWeekDisabled)||(i.daysOfWeekDisabled=i.daysOfWeekDisabled.split(/[,\s]*/)),i.daysOfWeekDisabled=t.map(i.daysOfWeekDisabled,function(t){return parseInt(t,10)});var n=String(i.orientation).toLowerCase().split(/\s+/g),r=i.orientation.toLowerCase();if(n=t.grep(n,function(t){return/^auto|left|right|top|bottom$/.test(t)}),i.orientation={x:"auto",y:"auto"},r&&"auto"!==r)if(1===n.length)switch(n[0]){case"top":case"bottom":i.orientation.y=n[0];break;case"left":case"right":i.orientation.x=n[0]}else r=t.grep(n,function(t){return/^left|right$/.test(t)}),i.orientation.x=r[0]||"auto",r=t.grep(n,function(t){return/^top|bottom$/.test(t)}),i.orientation.y=r[0]||"auto";else;},_events:[],_secondaryEvents:[],_applyEvents:function(t){for(var e,i,a=0;a<t.length;a++)e=t[a][0],i=t[a][1],e.on(i)},_unapplyEvents:function(t){for(var e,i,a=0;a<t.length;a++)e=t[a][0],i=t[a][1],e.off(i)},_buildEvents:function(){this.isInput?this._events=[[this.element,{focus:t.proxy(this.show,this),keyup:t.proxy(this.update,this),keydown:t.proxy(this.keydown,this)}]]:this.component&&this.hasInput?this._events=[[this.element.find("input"),{focus:t.proxy(this.show,this),keyup:t.proxy(this.update,this),keydown:t.proxy(this.keydown,this)}],[this.component,{click:t.proxy(this.show,this)}]]:this.element.is("div")?this.isInline=!0:this._events=[[this.element,{click:t.proxy(this.show,this)}]],this._secondaryEvents=[[this.picker,{click:t.proxy(this.click,this)}],[t(window),{resize:t.proxy(this.place,this)}],[t(document),{mousedown:t.proxy(function(t){this.element.is(t.target)||this.element.find(t.target).length||this.picker.is(t.target)||this.picker.find(t.target).length||this.hide()},this)}]]},_attachEvents:function(){this._detachEvents(),this._applyEvents(this._events)},_detachEvents:function(){this._unapplyEvents(this._events)},_attachSecondaryEvents:function(){this._detachSecondaryEvents(),this._applyEvents(this._secondaryEvents)},_detachSecondaryEvents:function(){this._unapplyEvents(this._secondaryEvents)},_trigger:function(e,i){var a=i||this.date,s=this._utc_to_local(a);this.element.trigger({type:e,date:s,format:t.proxy(function(t){var e=t||this.o.format;return d.formatDate(a,e,this.o.language)},this)})},show:function(t){this.isInline||this.picker.appendTo("body"),this.picker.show(),this.height=this.component?this.component.outerHeight():this.element.outerHeight(),this.place(),this._attachSecondaryEvents(),t&&t.preventDefault(),this._trigger("show")},hide:function(t){this.isInline||this.picker.is(":visible")&&(this.picker.hide().detach(),this._detachSecondaryEvents(),this.viewMode=this.o.startView,this.showMode(),this.o.forceParse&&(this.isInput&&this.element.val()||this.hasInput&&this.element.find("input").val())&&this.setValue(),this._trigger("hide"))},remove:function(){this.hide(),this._detachEvents(),this._detachSecondaryEvents(),this.picker.remove(),delete this.element.data().datepicker,this.isInput||delete this.element.data().date},_utc_to_local:function(t){return new Date(t.getTime()+6e4*t.getTimezoneOffset())},_local_to_utc:function(t){return new Date(t.getTime()-6e4*t.getTimezoneOffset())},_zero_time:function(t){return new Date(t.getFullYear(),t.getMonth(),t.getDate())},_zero_utc_time:function(t){return new Date(Date.UTC(t.getUTCFullYear(),t.getUTCMonth(),t.getUTCDate()))},getDate:function(){return this._utc_to_local(this.getUTCDate())},getUTCDate:function(){return this.date},setDate:function(t){this.setUTCDate(this._local_to_utc(t))},setUTCDate:function(t){this.date=t,this.setValue()},setValue:function(){var t=this.getFormattedDate();this.isInput?this.element.val(t).change():this.component&&this.element.find("input").val(t).change()},getFormattedDate:function(t){return void 0===t&&(t=this.o.format),d.formatDate(this.date,t,this.o.language)},setStartDate:function(t){this._process_options({startDate:t}),this.update(),this.updateNavArrows()},setEndDate:function(t){this._process_options({endDate:t}),this.update(),this.updateNavArrows()},setDaysOfWeekDisabled:function(t){this._process_options({daysOfWeekDisabled:t}),this.update(),this.updateNavArrows()},place:function(){if(!this.isInline){var i=this.picker.outerWidth(),a=this.picker.outerHeight(),s=e.width(),n=e.height(),h=e.scrollTop(),r=parseInt(this.element.parents().filter(function(){return"auto"!=t(this).css("z-index")}).first().css("z-index"))+10,o=this.component?this.component.parent().offset():this.element.offset(),d=this.component?this.component.outerHeight(!0):this.element.outerHeight(!1),l=this.component?this.component.outerWidth(!0):this.element.outerWidth(!1),c=o.left,p=o.top;this.picker.removeClass("datepicker-orient-top datepicker-orient-bottom datepicker-orient-right datepicker-orient-left"),"auto"!==this.o.orientation.x?(this.picker.addClass("datepicker-orient-"+this.o.orientation.x),"right"===this.o.orientation.x&&(c-=i-l)):(this.picker.addClass("datepicker-orient-left"),o.left<0?c-=o.left-10:o.left+i>s&&(c=s-i-10));var u,f,g=this.o.orientation.y;"auto"===g&&(u=-h+o.top-a,f=h+n-(o.top+d+a),g=Math.max(u,f)===f?"top":"bottom"),this.picker.addClass("datepicker-orient-"+g),"top"===g?p+=d:p-=a+parseInt(this.picker.css("padding-top")),this.picker.css({top:p,left:c,zIndex:r})}},_allow_update:!0,update:function(){if(this._allow_update){var t,e=new Date(this.date),i=!1;arguments&&arguments.length&&("string"==typeof arguments[0]||arguments[0]instanceof Date)?((t=arguments[0])instanceof Date&&(t=this._local_to_utc(t)),i=!0):(t=this.isInput?this.element.val():this.element.data("date")||this.element.find("input").val(),delete this.element.data().date),this.date=d.parseDate(t,this.o.format,this.o.language),i?this.setValue():t?e.getTime()!==this.date.getTime()&&this._trigger("changeDate"):this._trigger("clearDate"),this.date<this.o.startDate?(this.viewDate=new Date(this.o.startDate),this.date=new Date(this.o.startDate)):this.date>this.o.endDate?(this.viewDate=new Date(this.o.endDate),this.date=new Date(this.o.endDate)):(this.viewDate=new Date(this.date),this.date=new Date(this.date)),this.fill()}},fillDow:function(){var t=this.o.weekStart,e="<tr>";if(this.o.calendarWeeks){var i='<th class="cw">&nbsp;</th>';e+=i,this.picker.find(".datepicker-days thead tr:first-child").prepend(i)}for(;t<this.o.weekStart+7;)e+='<th class="dow">'+o[this.o.language].daysMin[t++%7]+"</th>";e+="</tr>",this.picker.find(".datepicker-days thead").append(e)},fillMonths:function(){for(var t="",e=0;e<12;)t+='<span class="month">'+o[this.o.language].monthsShort[e++]+"</span>";this.picker.find(".datepicker-months td").html(t)},setRange:function(e){e&&e.length?this.range=t.map(e,function(t){return t.valueOf()}):delete this.range,this.fill()},getClassNames:function(e){var i=[],a=this.viewDate.getUTCFullYear(),s=this.viewDate.getUTCMonth(),n=this.date.valueOf(),h=new Date;return e.getUTCFullYear()<a||e.getUTCFullYear()==a&&e.getUTCMonth()<s?i.push("old"):(e.getUTCFullYear()>a||e.getUTCFullYear()==a&&e.getUTCMonth()>s)&&i.push("new"),this.o.todayHighlight&&e.getUTCFullYear()==h.getFullYear()&&e.getUTCMonth()==h.getMonth()&&e.getUTCDate()==h.getDate()&&i.push("today"),n&&e.valueOf()==n&&i.push("active"),(e.valueOf()<this.o.startDate||e.valueOf()>this.o.endDate||-1!==t.inArray(e.getUTCDay(),this.o.daysOfWeekDisabled))&&i.push("disabled"),this.range&&(e>this.range[0]&&e<this.range[this.range.length-1]&&i.push("range"),-1!=t.inArray(e.valueOf(),this.range)&&i.push("selected")),i},fill:function(){var e,a=new Date(this.viewDate),s=a.getUTCFullYear(),n=a.getUTCMonth(),h=this.o.startDate!==-1/0?this.o.startDate.getUTCFullYear():-1/0,r=this.o.startDate!==-1/0?this.o.startDate.getUTCMonth():-1/0,l=this.o.endDate!==1/0?this.o.endDate.getUTCFullYear():1/0,c=this.o.endDate!==1/0?this.o.endDate.getUTCMonth():1/0;this.date&&this.date.valueOf();this.picker.find(".datepicker-days thead th.datepicker-switch").text(o[this.o.language].months[n]+" "+s),this.picker.find("tfoot th.today").text(o[this.o.language].today).toggle(!1!==this.o.todayBtn),this.picker.find("tfoot th.clear").text(o[this.o.language].clear).toggle(!1!==this.o.clearBtn),this.updateNavArrows(),this.fillMonths();var p=i(s,n-1,28,0,0,0,0),u=d.getDaysInMonth(p.getUTCFullYear(),p.getUTCMonth());p.setUTCDate(u),p.setUTCDate(u-(p.getUTCDay()-this.o.weekStart+7)%7);var f=new Date(p);f.setUTCDate(f.getUTCDate()+42),f=f.valueOf();for(var g,v=[];p.valueOf()<f;){if(p.getUTCDay()==this.o.weekStart&&(v.push("<tr>"),this.o.calendarWeeks)){var D=new Date(+p+(this.o.weekStart-p.getUTCDay()-7)%7*864e5),m=new Date(+D+(11-D.getUTCDay())%7*864e5),y=new Date(+(y=i(m.getUTCFullYear(),0,1))+(11-y.getUTCDay())%7*864e5),w=(m-y)/864e5/7+1;v.push('<td class="cw">'+w+"</td>")}if((g=this.getClassNames(p)).push("day"),this.o.beforeShowDay!==t.noop){var k=this.o.beforeShowDay(this._utc_to_local(p));void 0===k?k={}:"boolean"==typeof k?k={enabled:k}:"string"==typeof k&&(k={classes:k}),!1===k.enabled&&g.push("disabled"),k.classes&&(g=g.concat(k.classes.split(/\s+/))),k.tooltip&&(e=k.tooltip)}g=t.unique(g),v.push('<td class="'+g.join(" ")+'"'+(e?' title="'+e+'"':"")+">"+p.getUTCDate()+"</td>"),p.getUTCDay()==this.o.weekEnd&&v.push("</tr>"),p.setUTCDate(p.getUTCDate()+1)}this.picker.find(".datepicker-days tbody").empty().append(v.join(""));var C=this.date&&this.date.getUTCFullYear(),T=this.picker.find(".datepicker-months").find("th:eq(1)").text(s).end().find("span").removeClass("active");C&&C==s&&T.eq(this.date.getUTCMonth()).addClass("active"),(s<h||s>l)&&T.addClass("disabled"),s==h&&T.slice(0,r).addClass("disabled"),s==l&&T.slice(c+1).addClass("disabled"),v="",s=10*parseInt(s/10,10);var _=this.picker.find(".datepicker-years").find("th:eq(1)").text(s+"-"+(s+9)).end().find("td");s-=1;for(var U=-1;U<11;U++)v+='<span class="year'+(-1==U?" old":10==U?" new":"")+(C==s?" active":"")+(s<h||s>l?" disabled":"")+'">'+s+"</span>",s+=1;_.html(v)},updateNavArrows:function(){if(this._allow_update){var t=new Date(this.viewDate),e=t.getUTCFullYear(),i=t.getUTCMonth();switch(this.viewMode){case 0:this.o.startDate!==-1/0&&e<=this.o.startDate.getUTCFullYear()&&i<=this.o.startDate.getUTCMonth()?this.picker.find(".prev").css({visibility:"hidden"}):this.picker.find(".prev").css({visibility:"visible"}),this.o.endDate!==1/0&&e>=this.o.endDate.getUTCFullYear()&&i>=this.o.endDate.getUTCMonth()?this.picker.find(".next").css({visibility:"hidden"}):this.picker.find(".next").css({visibility:"visible"});break;case 1:case 2:this.o.startDate!==-1/0&&e<=this.o.startDate.getUTCFullYear()?this.picker.find(".prev").css({visibility:"hidden"}):this.picker.find(".prev").css({visibility:"visible"}),this.o.endDate!==1/0&&e>=this.o.endDate.getUTCFullYear()?this.picker.find(".next").css({visibility:"hidden"}):this.picker.find(".next").css({visibility:"visible"})}}},click:function(e){e.preventDefault();var a=t(e.target).closest("span, td, th");if(1==a.length)switch(a[0].nodeName.toLowerCase()){case"th":switch(a[0].className){case"datepicker-switch":this.showMode(1);break;case"prev":case"next":var s=d.modes[this.viewMode].navStep*("prev"==a[0].className?-1:1);switch(this.viewMode){case 0:this.viewDate=this.moveMonth(this.viewDate,s),this._trigger("changeMonth",this.viewDate);break;case 1:case 2:this.viewDate=this.moveYear(this.viewDate,s),1===this.viewMode&&this._trigger("changeYear",this.viewDate)}this.fill();break;case"today":var n=new Date;n=i(n.getFullYear(),n.getMonth(),n.getDate(),0,0,0),this.showMode(-2);var h="linked"==this.o.todayBtn?null:"view";this._setDate(n,h);break;case"clear":var r;this.isInput?r=this.element:this.component&&(r=this.element.find("input")),r&&r.val("").change(),this._trigger("changeDate"),this.update(),this.o.autoclose&&this.hide()}break;case"span":if(!a.is(".disabled")){if(this.viewDate.setUTCDate(1),a.is(".month")){var o=1,l=a.parent().find("span").index(a),c=this.viewDate.getUTCFullYear();this.viewDate.setUTCMonth(l),this._trigger("changeMonth",this.viewDate),1===this.o.minViewMode&&this._setDate(i(c,l,o,0,0,0,0))}else{c=parseInt(a.text(),10)||0,o=1,l=0;this.viewDate.setUTCFullYear(c),this._trigger("changeYear",this.viewDate),2===this.o.minViewMode&&this._setDate(i(c,l,o,0,0,0,0))}this.showMode(-1),this.fill()}break;case"td":if(a.is(".day")&&!a.is(".disabled")){o=parseInt(a.text(),10)||1,c=this.viewDate.getUTCFullYear(),l=this.viewDate.getUTCMonth();a.is(".old")?0===l?(l=11,c-=1):l-=1:a.is(".new")&&(11==l?(l=0,c+=1):l+=1),this._setDate(i(c,l,o,0,0,0,0))}}},_setDate:function(t,e){var i;e&&"date"!=e||(this.date=new Date(t)),e&&"view"!=e||(this.viewDate=new Date(t)),this.fill(),this.setValue(),this._trigger("changeDate"),this.isInput?i=this.element:this.component&&(i=this.element.find("input")),i&&i.change(),!this.o.autoclose||e&&"date"!=e||this.hide()},moveMonth:function(t,e){if(!e)return t;var i,a,s=new Date(t.valueOf()),n=s.getUTCDate(),h=s.getUTCMonth(),r=Math.abs(e);if(e=e>0?1:-1,1==r)a=-1==e?function(){return s.getUTCMonth()==h}:function(){return s.getUTCMonth()!=i},i=h+e,s.setUTCMonth(i),(i<0||i>11)&&(i=(i+12)%12);else{for(var o=0;o<r;o++)s=this.moveMonth(s,e);i=s.getUTCMonth(),s.setUTCDate(n),a=function(){return i!=s.getUTCMonth()}}for(;a();)s.setUTCDate(--n),s.setUTCMonth(i);return s},moveYear:function(t,e){return this.moveMonth(t,12*e)},dateWithinRange:function(t){return t>=this.o.startDate&&t<=this.o.endDate},keydown:function(t){if(this.picker.is(":not(:visible)"))27==t.keyCode&&this.show();else{var e,i,a,s,n=!1;switch(t.keyCode){case 27:this.hide(),t.preventDefault();break;case 37:case 39:if(!this.o.keyboardNavigation)break;e=37==t.keyCode?-1:1,t.ctrlKey?(i=this.moveYear(this.date,e),a=this.moveYear(this.viewDate,e),this._trigger("changeYear",this.viewDate)):t.shiftKey?(i=this.moveMonth(this.date,e),a=this.moveMonth(this.viewDate,e),this._trigger("changeMonth",this.viewDate)):((i=new Date(this.date)).setUTCDate(this.date.getUTCDate()+e),(a=new Date(this.viewDate)).setUTCDate(this.viewDate.getUTCDate()+e)),this.dateWithinRange(i)&&(this.date=i,this.viewDate=a,this.setValue(),this.update(),t.preventDefault(),n=!0);break;case 38:case 40:if(!this.o.keyboardNavigation)break;e=38==t.keyCode?-1:1,t.ctrlKey?(i=this.moveYear(this.date,e),a=this.moveYear(this.viewDate,e),this._trigger("changeYear",this.viewDate)):t.shiftKey?(i=this.moveMonth(this.date,e),a=this.moveMonth(this.viewDate,e),this._trigger("changeMonth",this.viewDate)):((i=new Date(this.date)).setUTCDate(this.date.getUTCDate()+7*e),(a=new Date(this.viewDate)).setUTCDate(this.viewDate.getUTCDate()+7*e)),this.dateWithinRange(i)&&(this.date=i,this.viewDate=a,this.setValue(),this.update(),t.preventDefault(),n=!0);break;case 13:this.hide(),t.preventDefault();break;case 9:this.hide()}if(n)this._trigger("changeDate"),this.isInput?s=this.element:this.component&&(s=this.element.find("input")),s&&s.change()}},showMode:function(t){t&&(this.viewMode=Math.max(this.o.minViewMode,Math.min(2,this.viewMode+t))),this.picker.find(">div").hide().filter(".datepicker-"+d.modes[this.viewMode].clsName).css("display","block"),this.updateNavArrows()}};var s=function(e,i){this.element=t(e),this.inputs=t.map(i.inputs,function(t){return t.jquery?t[0]:t}),delete i.inputs,t(this.inputs).datepicker(i).bind("changeDate",t.proxy(this.dateUpdated,this)),this.pickers=t.map(this.inputs,function(e){return t(e).data("datepicker")}),this.updateDates()};s.prototype={updateDates:function(){this.dates=t.map(this.pickers,function(t){return t.date}),this.updateRanges()},updateRanges:function(){var e=t.map(this.dates,function(t){return t.valueOf()});t.each(this.pickers,function(t,i){i.setRange(e)})},dateUpdated:function(e){var i=t(e.target).data("datepicker").getUTCDate(),a=t.inArray(e.target,this.inputs),s=this.inputs.length;if(-1!=a){if(i<this.dates[a])for(;a>=0&&i<this.dates[a];)this.pickers[a--].setUTCDate(i);else if(i>this.dates[a])for(;a<s&&i>this.dates[a];)this.pickers[a++].setUTCDate(i);this.updateDates()}},remove:function(){t.map(this.pickers,function(t){t.remove()}),delete this.element.data().datepicker}};var n=t.fn.datepicker;t.fn.datepicker=function(e){var i,n=Array.apply(null,arguments);return n.shift(),this.each(function(){var d=t(this),l=d.data("datepicker"),c="object"==typeof e&&e;if(!l){var p=function(e,i){var a=t(e).data(),s={},n=new RegExp("^"+i.toLowerCase()+"([A-Z])");for(var h in i=new RegExp("^"+i.toLowerCase()),a)i.test(h)&&(s[h.replace(n,function(t,e){return e.toLowerCase()})]=a[h]);return s}(this,"date"),u=function(e){var i={};if(o[e]||(e=e.split("-")[0],o[e])){var a=o[e];return t.each(r,function(t,e){e in a&&(i[e]=a[e])}),i}}(t.extend({},h,p,c).language),f=t.extend({},h,u,p,c);if(d.is(".input-daterange")||f.inputs){var g={inputs:f.inputs||d.find("input").toArray()};d.data("datepicker",l=new s(this,t.extend(f,g)))}else d.data("datepicker",l=new a(this,f))}if("string"==typeof e&&"function"==typeof l[e]&&void 0!==(i=l[e].apply(l,n)))return!1}),void 0!==i?i:this};var h=t.fn.datepicker.defaults={autoclose:!1,beforeShowDay:t.noop,calendarWeeks:!1,clearBtn:!1,daysOfWeekDisabled:[],endDate:1/0,forceParse:!0,format:"mm/dd/yyyy",keyboardNavigation:!0,language:"en",minViewMode:0,orientation:"auto",rtl:!1,startDate:-1/0,startView:0,todayBtn:!1,todayHighlight:!1,weekStart:0},r=t.fn.datepicker.locale_opts=["format","rtl","weekStart"];t.fn.datepicker.Constructor=a;var o=t.fn.datepicker.dates={en:{days:["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"],daysShort:["Sun","Mon","Tue","Wed","Thu","Fri","Sat","Sun"],daysMin:["Su","Mo","Tu","We","Th","Fr","Sa","Su"],months:["January","February","March","April","May","June","July","August","September","October","November","December"],monthsShort:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],today:"Today",clear:"Clear"}},d={modes:[{clsName:"days",navFnc:"Month",navStep:1},{clsName:"months",navFnc:"FullYear",navStep:1},{clsName:"years",navFnc:"FullYear",navStep:10}],isLeapYear:function(t){return t%4==0&&t%100!=0||t%400==0},getDaysInMonth:function(t,e){return[31,d.isLeapYear(t)?29:28,31,30,31,30,31,31,30,31,30,31][e]},validParts:/dd?|DD?|mm?|MM?|yy(?:yy)?/g,nonpunctuation:/[^ -\/:-@\[\u3400-\u9fff-`{-~\t\n\r]+/g,parseFormat:function(t){var e=t.replace(this.validParts,"\0").split("\0"),i=t.match(this.validParts);if(!e||!e.length||!i||0===i.length)throw new Error("Invalid date format.");return{separators:e,parts:i}},parseDate:function(e,s,n){if(e instanceof Date)return e;if("string"==typeof s&&(s=d.parseFormat(s)),/^[\-+]\d+[dmwy]([\s,]+[\-+]\d+[dmwy])*$/.test(e)){var h,r=/([\-+]\d+)([dmwy])/,l=e.match(/([\-+]\d+)([dmwy])/g);e=new Date;for(var c=0;c<l.length;c++)switch(f=r.exec(l[c]),h=parseInt(f[1]),f[2]){case"d":e.setUTCDate(e.getUTCDate()+h);break;case"m":e=a.prototype.moveMonth.call(a.prototype,e,h);break;case"w":e.setUTCDate(e.getUTCDate()+7*h);break;case"y":e=a.prototype.moveYear.call(a.prototype,e,h)}return i(e.getUTCFullYear(),e.getUTCMonth(),e.getUTCDate(),0,0,0)}l=e&&e.match(this.nonpunctuation)||[],e=new Date;var p,u,f,g={},v=["yyyy","yy","M","MM","m","mm","d","dd"],D={yyyy:function(t,e){return t.setUTCFullYear(e)},yy:function(t,e){return t.setUTCFullYear(2e3+e)},m:function(t,e){if(isNaN(t))return t;for(e-=1;e<0;)e+=12;for(e%=12,t.setUTCMonth(e);t.getUTCMonth()!=e;)t.setUTCDate(t.getUTCDate()-1);return t},d:function(t,e){return t.setUTCDate(e)}};D.M=D.MM=D.mm=D.m,D.dd=D.d,e=i(e.getFullYear(),e.getMonth(),e.getDate(),0,0,0);var m=s.parts.slice();if(l.length!=m.length&&(m=t(m).filter(function(e,i){return-1!==t.inArray(i,v)}).toArray()),l.length==m.length){c=0;for(var y=m.length;c<y;c++){if(p=parseInt(l[c],10),f=m[c],isNaN(p))switch(f){case"MM":u=t(o[n].months).filter(function(){var t=this.slice(0,l[c].length);return t==l[c].slice(0,t.length)}),p=t.inArray(u[0],o[n].months)+1;break;case"M":u=t(o[n].monthsShort).filter(function(){var t=this.slice(0,l[c].length);return t==l[c].slice(0,t.length)}),p=t.inArray(u[0],o[n].monthsShort)+1}g[f]=p}var w,k;for(c=0;c<v.length;c++)(k=v[c])in g&&!isNaN(g[k])&&(w=new Date(e),D[k](w,g[k]),isNaN(w)||(e=w))}return e},formatDate:function(e,i,a){"string"==typeof i&&(i=d.parseFormat(i));var s={d:e.getUTCDate(),D:o[a].daysShort[e.getUTCDay()],DD:o[a].days[e.getUTCDay()],m:e.getUTCMonth()+1,M:o[a].monthsShort[e.getUTCMonth()],MM:o[a].months[e.getUTCMonth()],yy:e.getUTCFullYear().toString().substring(2),yyyy:e.getUTCFullYear()};s.dd=(s.d<10?"0":"")+s.d,s.mm=(s.m<10?"0":"")+s.m;e=[];for(var n=t.extend([],i.separators),h=0,r=i.parts.length;h<=r;h++)n.length&&e.push(n.shift()),e.push(s[i.parts[h]]);return e.join("")},headTemplate:'<thead><tr><th class="prev">&laquo;</th><th colspan="5" class="datepicker-switch"></th><th class="next">&raquo;</th></tr></thead>',contTemplate:'<tbody><tr><td colspan="7"></td></tr></tbody>',footTemplate:'<tfoot><tr><th colspan="7" class="today"></th></tr><tr><th colspan="7" class="clear"></th></tr></tfoot>'};d.template='<div class="datepicker"><div class="datepicker-days"><table class=" table-condensed">'+d.headTemplate+"<tbody></tbody>"+d.footTemplate+'</table></div><div class="datepicker-months"><table class="table-condensed">'+d.headTemplate+d.contTemplate+d.footTemplate+'</table></div><div class="datepicker-years"><table class="table-condensed">'+d.headTemplate+d.contTemplate+d.footTemplate+"</table></div></div>",t.fn.datepicker.DPGlobal=d,t.fn.datepicker.noConflict=function(){return t.fn.datepicker=n,this},t(document).on("focus.datepicker.data-api click.datepicker.data-api",'[data-provide="datepicker"]',function(e){var i=t(this);i.data("datepicker")||(e.preventDefault(),i.datepicker("show"))}),t(function(){t('[data-provide="datepicker-inline"]').datepicker()})}(window.jQuery);