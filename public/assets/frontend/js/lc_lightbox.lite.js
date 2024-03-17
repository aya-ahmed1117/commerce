/**
 * LC Lightbox - LITE
 * yet.. another jQuery lightbox.. or not?
 * @version	: 	1.2.12
 * @copyright	:	Luca Montanari (LCweb)
 * @website	:	https://lcweb.it
 * @requires	:	jQuery v1.7 or later
 * Released under the MIT license
 */
!(function (l) {
  (lcl_objs = []),
    (lcl_shown = !1),
    (lcl_is_active = !1),
    (lcl_slideshow = void 0),
    (lcl_on_mobile =
      /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
        navigator.userAgent
      )),
    (lcl_curr_obj = !1),
    (lcl_curr_opts = !1),
    (lcl_curr_vars = !1),
    (lcl_deeplink_tracked = !1),
    (lcl_hashless_url = !1),
    (lcl_url_hash = "");
  (lc_lightbox = function (t, c) {
    if ("string" != typeof t && ("object" != typeof t || !t.length)) return !1;
    var n = !1;
    if (
      (l.each(lcl_objs, function (l, e) {
        if (JSON.stringify(e) == JSON.stringify(t)) return (n = e), !1;
      }),
      !1 === n)
    ) {
      var _ = new e(t, c);
      return lcl_objs.push(_), _;
    }
    return n;
  }),
    (lcl_destroy = function (e) {
      var t = l.inArray(e, lcl_objs);
      -1 !== t && lcl_objs.splice(t, 1);
    });
  var e = function (e, t) {
    var c = l.extend(
        {
          gallery: !0,
          gallery_hook: "rel",
          live_elements: !0,
          preload_all: !1,
          global_type: "image",
          src_attr: "href",
          title_attr: "title",
          txt_attr: "data-lcl-txt",
          author_attr: "data-lcl-author",
          slideshow: !0,
          open_close_time: 400,
          ol_time_diff: 100,
          fading_time: 80,
          animation_time: 250,
          slideshow_time: 6e3,
          autoplay: !1,
          counter: !1,
          progressbar: !0,
          carousel: !0,
          max_width: "93%",
          max_height: "93%",
          wrap_padding: !1,
          ol_opacity: 0.7,
          ol_color: "#111",
          ol_pattern: !1,
          border_w: 0,
          border_col: "#ddd",
          padding: 0,
          radius: 0,
          shadow: !0,
          remove_scrollbar: !0,
          wrap_class: "",
          skin: "light",
          data_position: "over",
          cmd_position: "inner",
          ins_close_pos: "normal",
          nav_btn_pos: "normal",
          txt_hidden: 500,
          show_title: !0,
          show_descr: !0,
          show_author: !0,
          thumbs_nav: !0,
          tn_icons: !0,
          tn_hidden: 500,
          thumbs_w: 110,
          thumbs_h: 110,
          thumb_attr: !1,
          thumbs_maker_url: !1,
          fullscreen: !1,
          fs_img_behavior: "fit",
          fs_only: 500,
          browser_fs_mode: !0,
          socials: !1,
          fb_share_params: !1,
          txt_toggle_cmd: !0,
          download: !1,
          touchswipe: !0,
          mousewheel: !0,
          modal: !1,
          rclick_prevent: !1,
          elems_parsed: function () {},
          html_is_ready: function () {},
          on_open: function () {},
          on_elem_switch: function () {},
          slideshow_start: function () {},
          slideshow_end: function () {},
          on_fs_enter: function () {},
          on_fs_exit: function () {},
          on_close: function () {},
        },
        t
      ),
      n = {
        elems: [],
        is_arr_instance: "string" != typeof e && void 0 === e[0].childNodes,
        elems_count:
          "string" != typeof e && void 0 === e[0].childNodes
            ? e.length
            : l(e).length,
        elems_selector: "string" == typeof e && e,
        elem_index: !1,
        gallery_hook_val: !1,
        preload_all_used: !1,
        img_sizes_cache: [],
        inner_cmd_w: !1,
        txt_exists: !1,
        txt_und_sizes: !1,
        force_fullscreen: !1,
        html_style: "",
        body_style: "",
      };
    "string" == typeof e && (e = l(e));
    var _ = l.data(e, "lcl_settings", c),
      o = l.data(e, "lcl_vars", n),
      i = function (l) {
        if ("string" != typeof l) return l;
        for (var e = 0, t = 0, c = l.toString().length; t < c; )
          e = ((e << 5) - e + l.charCodeAt(t++)) << 0;
        return e < 0 ? -1 * e : e;
      },
      r = function (e) {
        return e
          ? ((e = e
              .replace(/&lt;/g, "<")
              .replace(/&gt;/g, ">")
              .replace(/&amp;/g, "&")
              .replace(/&quot;/g, '"')
              .replace(/&#039;/g, "'")),
            l.trim(e))
          : e;
      },
      s = function (e, t) {
        var c = _[t];
        return -1 !== c.indexOf("> ")
          ? e.find(c.replace("> ", "")).length
            ? l.trim(e.find(c.replace("> ", "")).html())
            : ""
          : void 0 !== e.attr(c)
          ? r(e.attr(c))
          : "";
      },
      d = function (e) {
        var t = _,
          c = [];
        return (
          e.each(function () {
            var e = l(this),
              n = e.attr(t.src_attr),
              _ = i(n);
            if (
              o.gallery_hook_val &&
              e.attr(t.gallery_hook) != o.gallery_hook_val
            )
              return !0;
            var r = (function (e) {
              var t = !1;
              return (
                l.each(o.elems, function (l, c) {
                  if (c.hash == e) return (t = c), !1;
                }),
                t
              );
            })(_);
            if (r) var a = r;
            else {
              var d = u(n, e.data("lcl-type"));
              if ("unknown" != d)
                (a = {
                  src: n,
                  type: d,
                  hash: !!t.deeplink && i(n),
                  title: t.show_title ? s(e, "title_attr") : "",
                  txt: t.show_descr ? s(e, "txt_attr") : "",
                  author: t.show_author ? s(e, "author_attr") : "",
                  thumb:
                    t.thumb_attr && void 0 !== t.thumb_attr
                      ? e.attr(t.thumb_attr)
                      : "",
                  width:
                    "image" != d &&
                    void 0 !== e.data("lcl-w") &&
                    e.data("lcl-w"),
                  height:
                    "image" != d &&
                    void 0 !== e.data("lcl-h") &&
                    e.data("lcl-h"),
                  force_over_data:
                    void 0 !== e.data("lcl-force-over-data")
                      ? parseInt(e.data("lcl-force-over-data"), 10)
                      : "",
                  force_outer_cmd:
                    void 0 !== e.data("lcl-outer-cmd")
                      ? e.data("lcl-outer-cmd")
                      : "",
                }).download =
                  "image" == d &&
                  (void 0 !== e.data("lcl-path") ? e.data("lcl-path") : n);
              else a = { src: n, type: d, hash: !!t.deeplink && i(n) };
            }
            c.push(a);
          }),
          c.length < 2 && l(".lcl_prev, .lcl_next, #lcl_thumb_nav").remove(),
          !!c.length && ((o.elems = c), !0)
        );
      },
      u = function (l, e) {
        if (void 0 === e) return (e = _.global_type);
        l = l.toLowerCase();
        return /^(http|https)?:\/\/(?:[a-z\-]+\.)+[a-z]{2,6}(?:\/[^\/#?]+)+\.(?:jpe?g|gif|png)$/.test(
          l
        )
          ? "image"
          : "unknown";
      },
      m = function () {
        if (o.elems.length < 2 || !_.gallery) return !1;
        o.elem_index > 0 && h(!1, o.elem_index - 1),
          o.elem_index != o.elems.length - 1 && h(!1, o.elem_index + 1);
      },
      h = function (e, t, c) {
        var n = o;
        if ((void 0 === t && (t = n.elem_index), void 0 === t)) return !1;
        if ("image" == n.elems[t].type)
          var _ =
            "image" == n.elems[t].type ? n.elems[t].src : n.elems[t].poster;
        else _ = "";
        if (_ && void 0 === n.img_sizes_cache[_]) {
          let l = new Image();
          (l.src = _),
            (l.onload = function (l) {
              (n.img_sizes_cache[_] = {
                w: l.target.width,
                h: l.target.height,
              }),
                e && t == n.elem_index && b();
            });
        } else
          (e || void 0 !== c) && l("#lcl_loader").addClass("no_loader"),
            e && b();
      },
      f = function (t, c) {
        var n = l.data(t, "lcl_settings"),
          s = l.data(t, "lcl_vars");
        if (s.is_arr_instance) {
          var a = [];
          l.each(t, function (e, t) {
            var c = {},
              _ = !(void 0 !== t.type || !n.global_type) && n.global_type;
            if (
              (void 0 !== t.type && (_ = t.type),
              _ && -1 !== l.inArray(_, ["image"]))
            )
              void 0 !== t.src &&
                t.src &&
                ((c.src = t.src),
                (c.type = _),
                (c.hash = i(t.src)),
                (c.title = void 0 === t.title ? "" : r(t.title)),
                (c.txt = void 0 === t.txt ? "" : r(t.txt)),
                (c.author = void 0 === t.author ? "" : r(t.author)),
                (c.width = void 0 !== t.width && t.width),
                (c.height = void 0 !== t.height && t.height),
                (c.force_over_data =
                  void 0 !== t.force_over_data &&
                  parseInt(t.force_over_data, 10)),
                (c.force_outer_cmd =
                  void 0 !== t.force_outer_cmd && t.force_outer_cmd),
                (c.thumb = void 0 !== t.thumb && t.thumb),
                (c.download =
                  "image" == _ && (void 0 !== t.download ? t.download : t.src)),
                a.push(c));
            else {
              c = {
                src: c.src,
                type: "unknown",
                hash: !!n.deeplink && i(c.src),
              };
              a.push(c);
            }
          }),
            (s.elems = a);
        } else {
          var u = t;
          if (n.live_elements && s.elems_selector) {
            var m = !!(
              c &&
              n.gallery &&
              n.gallery_hook &&
              void 0 !== l(e[0]).attr(n.gallery_hook)
            )
              ? s.elems_selector +
                "[" +
                n.gallery_hook +
                "=" +
                c.attr(n.gallery_hook) +
                "]"
              : s.elems_selector;
            u = l(m);
          }
          if (!d(u))
            return (
              (!n.live_elements || (n.live_elements && !s.elems_selector)) &&
                console.error("LC Lightbox - no valid elements found"),
              !1
            );
        }
        (n.preload_all &&
          !s.preload_all_used &&
          ((s.preload_all_used = !0),
          l(document).ready(function (e) {
            l.each(s.elems, function (l, e) {
              h(!1, l);
            });
          })),
        "function" == typeof n.elems_parsed && n.elems_parsed.call(null, _, o),
        s.is_arr_instance) ||
          (u = s.elems_selector ? l(s.elems_selector) : t)
            .first()
            .trigger("lcl_elems_parsed", [s.elems]);
        return !0;
      };
    f(e);
    var p = function (e, t) {
        if (lcl_shown || lcl_is_active) return !1;
        (lcl_shown = !0),
          (lcl_is_active = !0),
          (lcl_curr_obj = e),
          (_ = l.data(e, "lcl_settings")),
          (o = l.data(e, "lcl_vars")),
          (lcl_curr_opts = _),
          (lcl_curr_vars = o);
        var c = _,
          n = o,
          i = void 0 !== t && t;
        if (!o)
          return (
            console.error("LC Lightbox - cannot open. Object not initialized"),
            !1
          );
        if (
          ((n.gallery_hook_val =
            !!(
              i &&
              c.gallery &&
              c.gallery_hook &&
              void 0 !== i.attr(c.gallery_hook)
            ) && i.attr(c.gallery_hook)),
          !f(e, t))
        )
          return !1;
        if (i)
          l.each(n.elems, function (l, e) {
            if (e.src == i.attr(c.src_attr)) return (n.elem_index = l), !1;
          });
        else if (parseInt(n.elem_index, 10) >= n.elems_count)
          return (
            console.error("LC Lightbox - selected index does not exist"), !1
          );
        h(!1),
          v(),
          c.touchswipe && Q(),
          n.force_fullscreen && F(!0, !0),
          l("#lcl_thumbs_nav").length && S(),
          h(!0),
          m();
      },
      g = function () {
        l("#lcl_wrap").removeClass("lcl_pre_show").addClass("lcl_shown"),
          l("#lcl_loader").removeClass("lcl_loader_pre_first_el");
      },
      v = function () {
        var e = _,
          t = o,
          c = [],
          n = "";
        if (
          ("number" == typeof document.documentMode &&
            (l("body").addClass("lcl_old_ie"),
            "outer" != e.cmd_position && (e.nav_btn_pos = "normal")),
          l("#lcl_wrap").length && l("#lcl_wrap").remove(),
          l("body").append(
            '<div id="lcl_wrap" class="lcl_pre_show lcl_pre_first_el lcl_first_sizing lcl_is_resizing"><div id="lcl_window"><div id="lcl_corner_close" title="close"></div><div id="lcl_loader" class="lcl_loader_pre_first_el"><span id="lcll_1"></span><span id="lcll_2"></span></div><div id="lcl_nav_cmd"><div class="lcl_icon lcl_prev" title="previous"></div><div class="lcl_icon lcl_play"></div><div class="lcl_icon lcl_next" title="next"></div><div class="lcl_icon lcl_counter"></div><div class="lcl_icon lcl_right_icon lcl_close" title="close"></div><div class="lcl_icon lcl_right_icon lcl_fullscreen" title="toggle fullscreen"></div><div class="lcl_icon lcl_right_icon lcl_txt_toggle" title="toggle text"></div><div class="lcl_icon lcl_right_icon lcl_download" title="download"></div><div class="lcl_icon lcl_right_icon lcl_thumbs_toggle" title="toggle thumbnails"></div><div class="lcl_icon lcl_right_icon lcl_socials" title="toggle socials"></div></div><div id="lcl_contents_wrap"><div id="lcl_subj"><div id="lcl_elem_wrap"></div></div><div id="lcl_txt"></div></div></div><div id="lcl_thumbs_nav" class="lcl_pre_tn_scroll"></div><div id="lcl_overlay"></div></div>'
          ),
          l("#lcl_wrap")
            .attr("data-lcl-max-w", e.max_width)
            .attr("data-lcl-max-h", e.max_height),
          c.push(
            "lcl_" +
              e.ins_close_pos +
              "_close lcl_nav_btn_" +
              e.nav_btn_pos +
              " lcl_" +
              e.ins_close_pos +
              "_close lcl_nav_btn_" +
              e.nav_btn_pos
          ),
          (!0 === e.tn_hidden ||
            ("number" == typeof e.tn_hidden &&
              (l(window).width() < e.tn_hidden ||
                l(window).height() < e.tn_hidden))) &&
            c.push("lcl_tn_hidden"),
          (!0 === e.txt_hidden ||
            ("number" == typeof e.txt_hidden &&
              (l(window).width() < e.txt_hidden ||
                l(window).height() < e.txt_hidden))) &&
            c.push("lcl_hidden_txt"),
          e.carousel || c.push("lcl_no_carousel"),
          lcl_on_mobile && c.push("lcl_on_mobile"),
          e.wrap_class && c.push(e.wrap_class),
          c.push("lcl_" + e.cmd_position + "_cmd"),
          "inner" != e.cmd_position)
        ) {
          var i = l("#lcl_nav_cmd").detach();
          l("#lcl_wrap").prepend(i);
        }
        if (
          (e.slideshow || l(".lcl_play").remove(),
          e.txt_toggle_cmd || l(".lcl_txt_toggle").remove(),
          e.socials || l(".lcl_socials").remove(),
          e.download || l(".lcl_download").remove(),
          (!e.counter || t.elems.length < 2 || !e.gallery) &&
            l(".lcl_counter").remove(),
          (t.force_fullscreen = !1),
          e.fullscreen
            ? (!0 === e.fs_only ||
                ("number" == typeof e.fs_only &&
                  (l(window).width() < e.fs_only ||
                    l(window).height() < e.fs_only))) &&
              (l(".lcl_fullscreen").remove(), (o.force_fullscreen = !0))
            : l(".lcl_fullscreen").remove(),
          t.elems.length < 2 || !e.gallery
            ? l(".lcl_prev, .lcl_play, .lcl_next").remove()
            : "middle" == e.nav_btn_pos &&
              (n += ".lcl_prev, .lcl_next {margin: " + e.padding + "px;}"),
          !e.thumbs_nav || o.elems.length < 2 || !e.gallery)
        )
          l("#lcl_thumbs_nav, .lcl_thumbs_toggle").remove();
        else {
          l("#lcl_thumbs_nav").css("height", e.thumbs_h);
          var r = l("#lcl_thumbs_nav").outerHeight(!0) - e.thumbs_h;
          (n += "#lcl_window {margin-top: " + -1 * (e.thumbs_h - r) + "px;}"),
            (n +=
              ".lcl_tn_hidden.lcl_outer_cmd:not(.lcl_fullscreen_mode) #lcl_window {margin-bottom: " +
              -1 * l(".lcl_close").outerHeight(!0) +
              "px;}");
        }
        if (
          (c.push("lcl_txt_" + e.data_position + " lcl_" + e.skin),
          (n +=
            "#lcl_overlay {background-color: " +
            e.thumbs_h +
            "px; opacity: " +
            e.ol_opacity +
            ";}"),
          e.ol_pattern &&
            l("#lcl_overlay").addClass("lcl_pattern_" + e.ol_pattern),
          e.modal && l("#lcl_overlay").addClass("lcl_modal"),
          e.wrap_padding &&
            (n += "#lcl_wrap {padding: " + e.wrap_padding + ";}"),
          e.border_w &&
            (n +=
              "#lcl_window {border: " +
              e.border_w +
              "px solid " +
              e.border_col +
              ";}"),
          e.padding &&
            (n +=
              "#lcl_subj, #lcl_txt, #lcl_nav_cmd {margin: " +
              e.padding +
              "px;}"),
          e.radius &&
            (n +=
              "#lcl_window, #lcl_contents_wrap {border-radius: " +
              e.radius +
              "px;}"),
          e.shadow &&
            (n += "#lcl_window {box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);}"),
          "inner" == e.cmd_position &&
            "corner" == e.ins_close_pos &&
            ((n +=
              "#lcl_corner_close {top: " +
              -1 *
                (e.border_w +
                  Math.ceil(l("#lcl_corner_close").outerWidth() / 2)) +
              "px;right: " +
              -1 *
                (e.border_w +
                  Math.ceil(l("#lcl_corner_close").outerHeight() / 2)) +
              ";}"),
            l("#lcl_nav_cmd > *:not(.lcl_close)").length ||
              (n +=
                "#lcl_wrap:not(.lcl_fullscreen_mode):not(.lcl_forced_outer_cmd) #lcl_nav_cmd {display: none;}")),
          l("#lcl_inline_style").length && l("#lcl_inline_style").remove(),
          l("head").append(
            '<style type="text/css" id="lcl_inline_style">' +
              n +
              "#lcl_overlay {background-color: " +
              e.ol_color +
              ";opacity: " +
              e.ol_opacity +
              ";}#lcl_window, #lcl_txt, #lcl_subj {-webkit-transition-duration: " +
              e.animation_time +
              "ms; transition-duration: " +
              e.animation_time +
              "ms;}#lcl_overlay {-webkit-transition-duration: " +
              e.open_close_time +
              "ms; transition-duration: " +
              e.open_close_time +
              "ms;}.lcl_first_sizing #lcl_window, .lcl_is_closing #lcl_window {-webkit-transition-duration: " +
              (e.open_close_time - e.ol_time_diff) +
              "ms; transition-duration: " +
              (e.open_close_time - e.ol_time_diff) +
              "ms;}.lcl_first_sizing #lcl_window {-webkit-transition-delay: " +
              e.ol_time_diff +
              "ms; transition-delay: " +
              e.ol_time_diff +
              "ms;}#lcl_loader, #lcl_contents_wrap, #lcl_corner_close {-webkit-transition-duration: " +
              e.fading_time +
              "ms; transition-duration: " +
              e.fading_time +
              "ms;}.lcl_toggling_txt #lcl_subj {-webkit-transition-delay: " +
              (e.fading_time + 200) +
              "ms !important;  transition-delay: " +
              (e.fading_time + 200) +
              "ms !important;}.lcl_fullscreen_mode.lcl_txt_over:not(.lcl_tn_hidden) #lcl_txt, .lcl_fullscreen_mode.lcl_force_txt_over:not(.lcl_tn_hidden) #lcl_txt {max-height: calc(100% - 42px - " +
              e.thumbs_h +
              "px);}.lcl_fullscreen_mode.lcl_playing_video.lcl_txt_over:not(.lcl_tn_hidden) #lcl_txt,.lcl_fullscreen_mode.lcl_playing_video.lcl_force_txt_over:not(.lcl_tn_hidden) #lcl_txt {max-height: calc(100% - 42px - 45px - " +
              e.thumbs_h +
              "px);}</style>"
          ),
          e.remove_scrollbar)
        ) {
          (o.html_style =
            void 0 !== jQuery("html").attr("style")
              ? jQuery("html").attr("style")
              : ""),
            (o.body_style =
              void 0 !== jQuery("body").attr("style")
                ? jQuery("body").attr("style")
                : "");
          var s = l(window).width();
          l("html").css("overflow", "hidden"),
            l("html").css({
              "margin-right": l(window).width() - s,
              "touch-action": "none",
            }),
            l("body").css({ overflow: "visible", "touch-action": "none" });
        }
        var a = o.elems[t.elem_index];
        ("image" != a.type ||
        ("image" == a.type && void 0 !== t.img_sizes_cache[a.src])
          ? c.push("lcl_show_already_shaped")
          : g(),
        l("#lcl_wrap").addClass(c.join(" ")),
        "function" == typeof e.html_is_ready &&
          e.html_is_ready.call(null, _, o),
        o.is_arr_instance) ||
          (o.elems_selector ? l(o.elems_selector) : lcl_curr_obj)
            .first()
            .trigger("lcl_html_is_ready", [_, o]);
      },
      w = function (e) {
        var t = l(e)[0],
          c = null;
        t.addEventListener(
          "touchstart",
          function (l) {
            1 === l.targetTouches.length && (c = l.targetTouches[0].clientY);
          },
          !1
        ),
          t.addEventListener(
            "touchmove",
            function (l) {
              1 === l.targetTouches.length &&
                (function (l) {
                  var e = l.targetTouches[0].clientY - c;
                  0 === t.scrollTop && e > 0 && l.preventDefault();
                  t.scrollHeight - t.scrollTop <= t.clientHeight &&
                    e < 0 &&
                    l.preventDefault();
                })(l);
            },
            !1
          );
      },
      b = function () {
        if (!lcl_shown) return !1;
        var e = o,
          t = e.elems[e.elem_index];
        (l("#lcl_wrap").attr("lc-lelem", e.elem_index),
        _.carousel ||
          (l("#lcl_wrap").removeClass("lcl_first_elem lcl_last_elem"),
          e.elem_index
            ? e.elem_index == e.elems.length - 1 &&
              l("#lcl_wrap").addClass("lcl_last_elem")
            : l("#lcl_wrap").addClass("lcl_first_elem")),
        l(document).trigger("lcl_before_populate_global", [t, e.elem_index]),
        y(t),
        e.is_arr_instance) ||
          (e.elems_selector ? l(e.elems_selector) : lcl_curr_obj)
            .first()
            .trigger("lcl_before_show", [t, e.elem_index]);
        (l(document).trigger("lcl_before_show_global", [t, e.elem_index]),
        l("#lcl_wrap").hasClass("lcl_pre_first_el")) &&
          ("function" == typeof _.on_open && _.on_open.call(null, _, o),
          e.is_arr_instance ||
            (e.elems_selector ? l(e.elems_selector) : lcl_curr_obj)
              .first()
              .trigger("lcl_on_open", [t, e.elem_index]));
        C(t), l("#lcl_subj").removeClass("lcl_switching_el");
      },
      x = function (l) {
        return !!(l.title || l.txt || l.author);
      },
      y = function (e) {
        var t = o.elem_index;
        if (
          (l("#lcl_elem_wrap").removeAttr("style").removeAttr("class").empty(),
          l("#lcl_wrap").attr("lcl-type", e.type),
          l("#lcl_elem_wrap").addClass("lcl_" + e.type + "_elem"),
          "image" === e.type)
        )
          l("#lcl_elem_wrap").css("background-image", "url('" + e.src + "')");
        else
          l("#lcl_elem_wrap").html(
            '<div id="lcl_inline" class="lcl_elem"><br/>Error loading the resource .. </div>'
          );
        if (lcl_curr_opts.download)
          if (e.download) {
            l(".lcl_download").show();
            var c = e.download.split("/"),
              n = c[c.length - 1];
            l(".lcl_download").html(
              '<a href="' +
                e.download +
                '" target="_blank" download="' +
                n +
                '"></a>'
            );
          } else l(".lcl_download").hide();
        l(".lcl_counter").html(t + 1 + " / " + o.elems.length),
          x(e) && "unknown" != e.type
            ? (l("#lcl_wrap").removeClass("lcl_no_txt"),
              l(".lcl_txt_toggle").show(),
              e.title &&
                l("#lcl_txt").append('<h3 id="lcl_title">' + e.title + "</h3>"),
              e.author &&
                l("#lcl_txt").append(
                  '<h5 id="lcl_author">by ' + e.author + "</h5>"
                ),
              e.txt &&
                l("#lcl_txt").append(
                  '<section id="lcl_descr">' + e.txt + "</section>"
                ),
              e.txt &&
                (e.title && e.author
                  ? l("#lcl_txt h5").addClass("lcl_txt_border")
                  : l("#lcl_txt h3").length
                  ? l("#lcl_txt h3").addClass("lcl_txt_border")
                  : l("#lcl_txt h5").addClass("lcl_txt_border")))
            : (l(".lcl_txt_toggle").hide(),
              l("#lcl_wrap").addClass("lcl_no_txt")),
          w("#lcl_txt");
      },
      k = function (e, t, c) {
        var n = 0,
          _ = l("#lcl_wrap"),
          o =
            l(window).width() -
            parseInt(_.css("padding-left"), 10) -
            parseInt(_.css("padding-right"), 10),
          i =
            l(window).height() -
            parseInt(_.css("padding-top"), 10) -
            parseInt(_.css("padding-bottom"), 10);
        if (!isNaN(parseFloat(e)) && isFinite(e)) n = parseInt(e, 10);
        else if (-1 !== e.toString().indexOf("%")) {
          n = ("w" == t ? o : i) * (parseInt(e, 10) / 100);
        } else
          -1 !== e.toString().indexOf("vw")
            ? (n = o * (parseInt(e, 10) / 100))
            : -1 !== e.toString().indexOf("vh") &&
              (n = i * (parseInt(e, 10) / 100));
        return (
          void 0 === c &&
            ("w" == t && n > o && (n = o), "h" == t && n > i && (n = i)),
          n
        );
      },
      C = function (e, t, c) {
        var n,
          i,
          r = _,
          s = o;
        void 0 === t && (t = {});
        var a = !!l(".lcl_fullscreen_mode").length,
          d = a
            ? 0
            : 2 * parseInt(r.border_w, 10) + 2 * parseInt(r.padding, 10);
        void 0 !== t.side_txt_checked ||
          (void 0 !== t.no_txt_under && t.no_txt_under) ||
          l("#lcl_wrap").removeClass("lcl_force_txt_over");
        var u =
            l(".lcl_force_txt_over").length ||
            l(".lcl_hidden_txt").length ||
            -1 === l.inArray(r.data_position, ["rside", "lside"]) ||
            !x(e)
              ? 0
              : l("#lcl_txt").outerWidth(),
          m = d + u,
          h =
            d +
            (a || !l("#lcl_thumbs_nav").length || l(".lcl_tn_hidden").length
              ? 0
              : l("#lcl_thumbs_nav").outerHeight(!0) -
                parseInt(l("#lcl_wrap").css("padding-bottom"), 10)) +
            (!a && l(".lcl_outer_cmd").length
              ? l(".lcl_close").outerHeight(!0) +
                parseInt(l("#lcl_nav_cmd").css("padding-top"), 10) +
                parseInt(l("#lcl_nav_cmd").css("padding-bottom"), 10)
              : 0),
          f = l("#lcl_wrap").attr("data-lcl-max-w"),
          p = l("#lcl_wrap").attr("data-lcl-max-h"),
          v = a ? l(window).width() : Math.floor(k(f, "w")) - m,
          w = a ? l(window).height() : Math.floor(k(p, "h")) - h;
        if ("object" == typeof s.txt_und_sizes) {
          if (
            ((n = s.txt_und_sizes.w),
            (i = s.txt_und_sizes.h),
            "image" == e.type)
          )
            var b = s.img_sizes_cache[e.src];
        } else if ("image" === e.type) {
          if (
            (l("#lcl_elem_wrap").css("bottom", 0),
            void 0 === s.img_sizes_cache[e.src])
          )
            return (
              setTimeout(function () {
                C(e, t, c);
              }, 50),
              !1
            );
          if (
            ((b = s.img_sizes_cache[e.src]).w <= v
              ? ((n = b.w), (i = b.h))
              : ((n = v), (i = Math.floor(n * (b.h / b.w)))),
            i > w && ((i = w), (n = Math.floor(i * (b.w / b.h)))),
            x(e) &&
              !l(".lcl_hidden_txt").length &&
              "under" == r.data_position &&
              void 0 === t.no_txt_under)
          )
            return (
              j(n, i, w),
              l(document)
                .off("lcl_txt_und_calc")
                .on("lcl_txt_und_calc", function () {
                  if (s.txt_und_sizes)
                    return (
                      "no_under" == s.txt_und_sizes && (t.no_txt_under = !0),
                      C(s.elems[s.elem_index], t)
                    );
                }),
              !1
            );
          l("#lcl_subj").css("maxHeight", "none");
        } else (n = 280), (i = 125);
        if (
          ("rside" == r.data_position || "lside" == r.data_position) &&
          !l(".lcl_no_txt").length &&
          void 0 === t.side_txt_checked
        ) {
          var y = n + d,
            I = i + d,
            L =
              ((b = "image" == e.type ? s.img_sizes_cache[e.src] : ""),
              e.force_over_data);
          if (
            (L || (L = 400),
            "image" == e.type && b.w > L && b.h > L && !z(e, L, y, I, u))
          )
            return (t.side_txt_checked = !0), C(e, t);
        }
        if (
          ((s.txt_und_sizes = !1),
          void 0 === t.inner_cmd_checked &&
            ("inner" == r.cmd_position || e.force_outer_cmd) &&
            T(e, n))
        )
          return (t.inner_cmd_checked = !0), C(e, t);
        l("#lcl_wrap").removeClass("lcl_pre_first_el"),
          l("#lcl_window").css({
            width: a ? "100%" : n + d + u,
            height: a ? "100%" : i + d,
          }),
          l(".lcl_show_already_shaped").length &&
            setTimeout(function () {
              l("#lcl_wrap").removeClass("lcl_show_already_shaped"), g();
            }, 10),
          R(),
          "undefined" != typeof lcl_size_n_show_timeout &&
            clearTimeout(lcl_size_n_show_timeout);
        var E = l(".lcl_first_sizing").length
          ? r.open_close_time + 20
          : r.animation_time;
        (l(".lcl_browser_resize").length ||
          l(".lcl_toggling_fs").length ||
          a) &&
          (E = 0),
          (lcl_size_n_show_timeout = setTimeout(function () {
            lcl_is_active && (lcl_is_active = !1),
              l(".lcl_first_sizing").length &&
                r.autoplay &&
                s.elems.length > 1 &&
                (r.carousel || s.elem_index < s.elems.length - 1) &&
                lcl_start_slideshow(),
              "image" == e.type &&
                (l(".lcl_fullscreen_mode").length
                  ? H(b)
                  : l(".lcl_image_elem").css("background-size", "cover")),
              l("#lcl_wrap").removeClass(
                "lcl_first_sizing lcl_switching_elem lcl_is_resizing lcl_browser_resize"
              ),
              l("#lcl_loader").removeClass("no_loader"),
              l(document).trigger("lcl_resized_window");
          }, E));
      };
    l(window).resize(function () {
      if (!lcl_shown || e != lcl_curr_obj || l(".lcl_toggling_fs").length)
        return !1;
      l("#lcl_wrap").addClass("lcl_browser_resize"),
        "undefined" != typeof lcl_rs_defer && clearTimeout(lcl_rs_defer),
        (lcl_rs_defer = setTimeout(function () {
          lcl_resize();
        }, 50));
    });
    var j = function (e, t, c, n) {
        var i = void 0 === n ? 1 : n,
          r = l(".lcl_fullscreen_mode").length,
          s = (Math.ceil(l("#lcl_txt").outerHeight()), e / t);
        if (r && l("#lcl_thumbs_nav").length)
          return (
            l("#lcl_wrap").addClass("lcl_force_txt_over"),
            l("#lcl_subj").css("maxHeight", "none"),
            l("#lcl_txt").css({ right: 0, width: "auto" }),
            (o.txt_und_sizes = "no_under"),
            l(document).trigger("lcl_txt_und_calc"),
            !1
          );
        l("#lcl_wrap")
          .removeClass("lcl_force_txt_over")
          .addClass("lcl_txt_under_calc"),
          r
            ? l("#lcl_txt").css({ right: 0, width: "auto" })
            : l("#lcl_txt").css({ right: "auto", width: e }),
          "undefined" != typeof lcl_txt_under_calc &&
            clearInterval(lcl_txt_under_calc),
          (lcl_txt_under_calc = setTimeout(function () {
            var a = Math.ceil(l("#lcl_txt").outerHeight()),
              d = t + a - c;
            if (r)
              return (
                l("#lcl_wrap").removeClass("lcl_txt_under_calc"),
                l("#lcl_subj").css("maxHeight", "calc(100% - " + a + "px)"),
                (o.txt_und_sizes = { w: e, h: t }),
                l(document).trigger("lcl_txt_und_calc"),
                !1
              );
            if (d > 0 && (void 0 === n || n < 10)) {
              var u = t - d,
                m = Math.floor(u * s),
                h = o.elems[o.elem_index].force_over_data;
              return (
                h || (h = 400),
                m < h || u < h
                  ? (l("#lcl_wrap")
                      .removeClass("lcl_txt_under_calc")
                      .addClass("lcl_force_txt_over"),
                    l("#lcl_subj").css("maxHeight", "none"),
                    l("#lcl_txt").css({ right: 0, width: "auto" }),
                    (o.txt_und_sizes = "no_under"),
                    l(document).trigger("lcl_txt_und_calc"),
                    !0)
                  : j(m, u, c, i + 1)
              );
            }
            return (
              l("#lcl_wrap").removeClass("lcl_txt_under_calc"),
              l("#lcl_subj").css("maxHeight", t + _.padding),
              (o.txt_und_sizes = { w: e, h: t + a }),
              l(document).trigger("lcl_txt_und_calc"),
              !0
            );
          }, 120));
      },
      z = function (e, t, c, n, _) {
        var o = l(".lcl_force_txt_over").length;
        if (c < t || ("html" != e.type && n < t)) {
          if (o) return !0;
          l("#lcl_wrap").addClass("lcl_force_txt_over");
        } else {
          if (!o) return !0;
          l("#lcl_wrap").removeClass("lcl_force_txt_over");
        }
        return !1;
      },
      T = function (e, t) {
        var c = _,
          n = !!l(".lcl_fullscreen_mode").length;
        if (l(".lcl_forced_outer_cmd").length) {
          l("#lcl_wrap").removeClass("lcl_forced_outer_cmd"),
            l("#lcl_wrap")
              .removeClass("lcl_outer_cmd")
              .addClass("lcl_inner_cmd");
          var i = l("#lcl_nav_cmd").detach();
          l("#lcl_window").prepend(i);
        }
        if (
          (n ||
            !1 !== o.inner_cmd_w ||
            ((o.inner_cmd_w = 0),
            jQuery("#lcl_nav_cmd .lcl_icon").each(function () {
              if (
                (l(this).hasClass("lcl_prev") ||
                  l(this).hasClass("lcl_next")) &&
                "middle" == c.nav_btn_pos
              )
                return !0;
              o.inner_cmd_w = o.inner_cmd_w + l(this).outerWidth(!0);
            })),
          n || e.force_outer_cmd || t <= o.inner_cmd_w)
        ) {
          l("#lcl_wrap").addClass("lcl_forced_outer_cmd"),
            l("#lcl_wrap")
              .removeClass("lcl_inner_cmd")
              .addClass("lcl_outer_cmd");
          i = l("#lcl_nav_cmd").detach();
          return l("#lcl_wrap").prepend(i), !0;
        }
        return !1;
      },
      I = function (e, t) {
        var c = o,
          n = _.carousel;
        if (
          lcl_is_active ||
          c.elems.length < 2 ||
          !_.gallery ||
          l(".lcl_switching_elem").length
        )
          return !1;
        if ("next" == e)
          if (c.elem_index == c.elems.length - 1) {
            if (!n) return !1;
            e = 0;
          } else e = c.elem_index + 1;
        else if ("prev" == e)
          if (c.elem_index) e = c.elem_index - 1;
          else {
            if (!n) return !1;
            e = c.elems.length - 1;
          }
        else if (
          (e = parseInt(e, 10)) < 0 ||
          e >= c.elems.length ||
          e == c.elem_index
        )
          return !1;
        "undefined" != typeof lcl_slideshow &&
          (void 0 === t || (!n && e == c.elems.length - 1)) &&
          lcl_stop_slideshow(),
          (lcl_is_active = !0),
          N(e),
          h(!1, e, !0),
          l("#lcl_wrap").addClass("lcl_switching_elem"),
          setTimeout(function () {
            (l("#lcl_wrap").removeClass("lcl_playing_video"),
            "html" == c.elems[c.elem_index].type &&
              (l("#lcl_window").css(
                "height",
                l("#lcl_contents_wrap").outerHeight()
              ),
              l("#lcl_contents_wrap").css("maxHeight", "none")),
            "function" == typeof _.on_elem_switch &&
              _.on_elem_switch.call(null, _, o, e),
            !c.is_arr_instance && lcl_curr_obj) &&
              (c.elems_selector ? l(c.elems_selector) : lcl_curr_obj)
                .first()
                .trigger("lcl_on_elem_switch", [c.elem_index, e]);
            l("#lcl_wrap").removeClass("lcl_no_txt lcl_loading_iframe"),
              l("#lcl_txt").empty(),
              (c.elem_index = e),
              h(!0),
              m();
          }, _.fading_time);
      },
      L = function (e) {
        var t = _;
        if (!t.progressbar) return !1;
        var c = e ? 0 : t.animation_time + t.fading_time,
          n = t.slideshow_time + t.animation_time - c;
        l("#lcl_progressbar").length ||
          l("#lcl_wrap").append('<div id="lcl_progressbar"></div>'),
          "undefined" != typeof lcl_pb_timeout && clearTimeout(lcl_pb_timeout),
          (lcl_pb_timeout = setTimeout(function () {
            l("#lcl_progressbar")
              .stop(!0)
              .removeAttr("style")
              .css("width", 0)
              .animate({ width: "100%" }, n, "linear", function () {
                l("#lcl_progressbar").fadeTo(0, 0);
              });
          }, c));
      },
      E = function () {
        if (!lcl_shown) return !1;
        ("function" == typeof _.on_close && _.on_close.call(null, _, o),
        o.is_arr_instance) ||
          (o.elems_selector ? l(o.elems_selector) : lcl_curr_obj)
            .first()
            .trigger("lcl_on_close");
        l(document).trigger("lcl_on_close_global"),
          l("#lcl_wrap")
            .removeClass("lcl_shown")
            .addClass("lcl_is_closing lcl_tn_hidden"),
          lcl_stop_slideshow(),
          l(".lcl_fullscreen_mode").length && A(),
          setTimeout(function () {
            l("#lcl_wrap, #lcl_inline_style").remove(),
              _.remove_scrollbar &&
                (jQuery("html").attr("style", o.html_style),
                jQuery("body").attr("style", o.body_style)),
              l(document).trigger("lcl_closed_global"),
              (lcl_curr_obj = !1),
              (lcl_curr_opts = !1),
              (lcl_curr_vars = !1),
              (lcl_shown = !1),
              (lcl_is_active = !1);
          }, _.open_close_time + 80),
          "undefined" != typeof lcl_size_check && clearTimeout(lcl_size_check);
      },
      F = function (e, t) {
        if (
          (void 0 === t && (t = !1),
          !lcl_shown || !_.fullscreen || (!t && lcl_is_active))
        )
          return !1;
        var c = _,
          n = o;
        l("#lcl_wrap").addClass("lcl_toggling_fs"),
          c.browser_fs_mode &&
            void 0 !== e &&
            (document.documentElement.requestFullscreen
              ? document.documentElement.requestFullscreen()
              : document.documentElement.msRequestFullscreen
              ? document.documentElement.msRequestFullscreen()
              : document.documentElement.mozRequestFullScreen
              ? document.documentElement.mozRequestFullScreen()
              : document.documentElement.webkitRequestFullscreen &&
                document.documentElement.webkitRequestFullscreen(
                  Element.ALLOW_KEYBOARD_INPUT
                ));
        var i = t ? c.open_close_time : c.fading_time;
        setTimeout(function () {
          l("#lcl_wrap").addClass("lcl_fullscreen_mode"),
            C(n.elems[n.elem_index]),
            l(document).on("lcl_resized_window", function () {
              l(document).off("lcl_resized_window"),
                (t ||
                  ("under" == lcl_curr_opts.data_position &&
                    !l(".lcl_force_txt_over").length)) &&
                  C(lcl_curr_vars.elems[lcl_curr_vars.elem_index]),
                setTimeout(function () {
                  l("#lcl_wrap").removeClass("lcl_toggling_fs");
                }, 150);
            });
        }, i),
          "function" == typeof c.on_fs_enter && c.on_fs_enter.call(null, c, n),
          o.is_arr_instance || lcl_curr_obj.first().trigger("lcl_on_fs_enter");
      },
      H = function (e) {
        var t = _.fs_img_behavior;
        if (
          l(".lcl_fullscreen_mode").length &&
          e.w <= l("#lcl_subj").width() &&
          e.h <= l("#lcl_subj").height()
        )
          return l(".lcl_image_elem").css("background-size", "auto"), !1;
        if ("fit" == t) l(".lcl_image_elem").css("background-size", "contain");
        else if ("fill" == t)
          l(".lcl_image_elem").css("background-size", "cover");
        else {
          if (void 0 === e)
            return l(".lcl_image_elem").css("background-size", "cover"), !1;
          var c = l(window).width() / l(window).height() - e.w / e.h,
            n = l(window).width() - e.w,
            o = l(window).height() - e.h;
          c <= 1.15 && c >= -1.15 && n <= 350 && o <= 350
            ? l(".lcl_image_elem").css("background-size", "cover")
            : l(".lcl_image_elem").css("background-size", "contain");
        }
      },
      O = function (e) {
        if (!lcl_shown || !_.fullscreen || lcl_is_active) return !1;
        var t = _;
        (l("#lcl_wrap").addClass("lcl_toggling_fs"),
        l("#lcl_window").fadeTo(70, 0),
        setTimeout(function () {
          if (t.browser_fs_mode && void 0 !== e) {
            A();
            var c = 250;
          } else c = 0;
          l("#lcl_wrap").removeClass("lcl_fullscreen_mode"),
            setTimeout(function () {
              C(o.elems[o.elem_index]);
              var e = e || navigator.userAgent,
                t =
                  e.indexOf("MSIE ") > -1 || e.indexOf("Trident/") > -1
                    ? 100
                    : 0;
              setTimeout(function () {
                l("#lcl_window").fadeTo(30, 1),
                  l("#lcl_wrap").removeClass("lcl_toggling_fs");
              }, 300 + t);
            }, c);
        }, 70),
        "function" == typeof t.on_fs_exit && t.on_fs_exit.call(null, _, o),
        o.is_arr_instance) ||
          (o.elems_selector ? l(o.elems_selector) : lcl_curr_obj)
            .first()
            .trigger("lcl_on_fs_exit");
      },
      A = function () {
        document.exitFullscreen
          ? document.exitFullscreen()
          : document.msExitFullscreen
          ? document.msExitFullscreen()
          : document.mozCancelFullScreen
          ? document.mozCancelFullScreen()
          : document.webkitExitFullscreen && document.webkitExitFullscreen();
      },
      S = function () {
        var e = !1,
          t = !1,
          c = Date.now();
        if (
          (l("#lcl_thumbs_nav").append(
            '<span class="lcl_tn_prev"></span><ul class="lcl_tn_inner"></ul><span class="lcl_tn_next"></span>'
          ),
          l("#lcl_thumbs_nav").attr("rel", c),
          l.each(o.elems, function (n, i) {
            if ("unknown" != i.type) {
              e || (t && t != i.type ? (e = !0) : (t = i.type));
              var r = "",
                s = "";
              if (((tpc = ""), i.thumb))
                (s = i.thumb),
                  (r = "style=\"background-image: url('" + i.thumb + "');\"");
              else {
                switch (i.type) {
                  case "image":
                    s = i.src;
                    break;
                  case "youtube":
                    s = i.poster
                      ? i.poster
                      : "https://img.youtube.com/vi/" +
                        i.video_id +
                        "/maxresdefault.jpg";
                    break;
                  case "vimeo":
                    if (i.poster) {
                      s = i.poster;
                      break;
                    }
                    void 0 === o.vimeo_thumb_cache[i.src]
                      ? ((tpc = "lcl_tn_preload"),
                        l.getJSON(
                          "https://www.vimeo.com/api/v2/video/" +
                            i.video_id +
                            ".json?callback=?",
                          { format: "json" },
                          function (e) {
                            D(e[0].thumbnail_large, n, c),
                              (o.vimeo_thumb_cache[i.src] =
                                e[0].thumbnail_large),
                              l(".lcl_tn_inner li[rel=" + n + "]").attr(
                                "style",
                                l(".lcl_tn_inner li[rel=" + n + "]").attr(
                                  "style"
                                ) +
                                  " background-image: url('" +
                                  e[0].thumbnail_large +
                                  "');"
                              );
                          }
                        ))
                      : (s = o.vimeo_thumb_cache[i.src]);
                    break;
                  case "video":
                  case "iframe":
                  case "html":
                    i.poster && (s = i.poster);
                    break;
                  case "dailymotion":
                    s = i.poster
                      ? i.poster
                      : "http://www.dailymotion.com/thumbnail/video/" +
                        i.video_id;
                }
                if (s) {
                  if (
                    _.thumbs_maker_url &&
                    (i.poster ||
                      -1 ===
                        l.inArray(i.type, ["youtube", "vimeo", "dailymotion"]))
                  )
                    s = _.thumbs_maker_url
                      .replace("%URL%", encodeURIComponent(s))
                      .replace("%W%", _.thumbs_w)
                      .replace("%H%", _.thumbs_h);
                  (r = "style=\"background-image: url('" + s + "');\""),
                    -1 ===
                      l.inArray(i.type, ["youtube", "vimeo", "dailymotion"]) ||
                      i.poster ||
                      (o.elems[n].vid_poster = s);
                }
              }
              if (("html" == i.type || "iframe" == i.type) && !r) return !0;
              var a =
                "video" != i.type || r
                  ? ""
                  : '<video src="' + i.src + '"></video>';
              (tpc = "lcl_tn_preload"),
                l(".lcl_tn_inner").append(
                  '<li class="lcl_tn_' +
                    i.type +
                    " " +
                    tpc +
                    '" title="' +
                    i.title +
                    '" rel="' +
                    n +
                    '" ' +
                    r +
                    ">" +
                    a +
                    "</li>"
                ),
                tpc && D(s, n, c);
            }
          }),
          l(".lcl_tn_inner > li").length < 2)
        )
          return l("#lcl_thumbs_nav").remove(), !1;
        l(".lcl_tn_inner > li").css("width", _.thumbs_w),
          lcl_on_mobile ||
            l(".lcl_tn_inner").lcl_smoothscroll(0.3, 400, !1, !0),
          e && _.tn_icons && l(".lcl_tn_inner").addClass("lcl_tn_mixed_types"),
          setTimeout(function () {
            N(o.elem_index);
          }, 300);
      },
      D = function (e, t, c) {
        l("<img/>")
          .bind("load", function () {
            if (!o) return !1;
            (o.img_sizes_cache[e] = { w: this.width, h: this.height }),
              l("#lcl_thumbs_nav[rel=" + c + "] li[rel=" + t + "]").removeClass(
                "lcl_tn_preload"
              ),
              setTimeout(function () {
                R(), q();
              }, 500);
          })
          .attr("src", e);
      },
      M = function () {
        var e = 0;
        return (
          l(".lcl_tn_inner > li").each(function () {
            e += l(this).outerWidth(!0);
          }),
          e
        );
      },
      R = function () {
        if (!l("#lcl_thumbs_nav").length) return !1;
        M() > l(".lcl_tn_inner").width()
          ? l("#lcl_thumbs_nav").addClass("lcl_tn_has_arr")
          : l("#lcl_thumbs_nav").removeClass("lcl_tn_has_arr");
      },
      q = function () {
        var e = l(".lcl_tn_inner").scrollLeft();
        e
          ? l(".lcl_tn_prev")
              .removeClass("lcl_tn_disabled_arr")
              .stop(!0)
              .fadeTo(150, 1)
          : l(".lcl_tn_prev")
              .addClass("lcl_tn_disabled_arr")
              .stop(!0)
              .fadeTo(150, 0.5),
          e >= M() - l(".lcl_tn_inner").width()
            ? l(".lcl_tn_next")
                .addClass("lcl_tn_disabled_arr")
                .stop(!0)
                .fadeTo(150, 0.5)
            : l(".lcl_tn_next")
                .removeClass("lcl_tn_disabled_arr")
                .stop(!0)
                .fadeTo(150, 1);
      };
    l(document).on("lcl_smoothscroll_end", ".lcl_tn_inner", function (l) {
      if (e != lcl_curr_obj) return !0;
      q();
    });
    var N = function (e) {
      var t = l(".lcl_tn_inner > li[rel=" + e + "]");
      if (!t.length) return !1;
      var c = 0;
      l(".lcl_tn_inner > li").each(function (t, n) {
        if (l(this).attr("rel") == e) return (c = t), !1;
      });
      var n = l(".lcl_tn_inner > li").last().outerWidth(),
        _ = parseInt(l(".lcl_tn_inner > li").last().css("margin-left"), 10),
        o =
          (l(".lcl_tn_inner").width(),
          Math.floor((l(".lcl_tn_inner").width() - n - _) / 2)),
        i = n * c + _ * (c - 1) + Math.floor(_ / 2) - o;
      l(".lcl_tn_inner")
        .stop(!0)
        .animate({ scrollLeft: i }, 500, function () {
          l(".lcl_tn_inner").trigger("lcl_smoothscroll_end"),
            l("#lcl_thumbs_nav").removeClass("lcl_pre_tn_scroll");
        }),
        l(".lcl_tn_inner > li").removeClass("lcl_sel_thumb"),
        t.addClass("lcl_sel_thumb");
    };
    (l.fn.lcl_smoothscroll = function (e, t, c, n) {
      if (lcl_on_mobile) return !1;
      this.off("mousemove mousedown mouseup mouseenter mouseleave");
      var _ = this,
        o = void 0 === c || !c,
        i = void 0 === n || !n,
        r = !1,
        s = !1,
        a = 0,
        d = 0,
        u = 0,
        m = 0;
      _.mousemove(function (l) {
        !0 === s &&
          (_.stop(!0),
          o && _.scrollLeft(m + (d - l.pageX)),
          i && _.scrollTop(u + (a - l.pageY)));
      }),
        _.mouseover(function () {
          r && clearTimeout(r);
        }),
        _.mouseout(function () {
          r = setTimeout(function () {
            (s = !1), (r = !1);
          }, 500);
        }),
        _.mousedown(function (l) {
          "undefined" != typeof lc_sms_timeout && clearTimeout(lc_sms_timeout),
            (s = !0),
            (u = _.scrollTop()),
            (m = _.scrollLeft()),
            (a = l.pageY),
            (d = l.pageX);
        }),
        _.mouseup(function (c) {
          s = !1;
          var n = _.scrollTop(),
            r = -1 * (u - n),
            a = n + r * e,
            d = _.scrollLeft(),
            h = -1 * (m - d),
            f = d + h * e;
          if (r < 3 && r > -3 && h < 3 && h > -3)
            return l(c.target).trigger("lcl_tn_elem_click"), !1;
          if (r > 20 || h > 20) {
            var p = {};
            i && (p.scrollTop = a),
              o && (p.scrollLeft = f),
              _.stop(!0).animate(p, t, "linear", function () {
                _.trigger("lcl_smoothscroll_end");
              });
          }
        });
    }),
      n.is_arr_instance ||
        (c.live_elements && n.elems_selector
          ? l(document)
              .off("click", n.elems_selector)
              .on("click", n.elems_selector, function (t) {
                t.preventDefault(),
                  (l.data(e, "lcl_vars").elems_count = l(
                    n.elems_selector
                  ).length),
                  p(e, l(this)),
                  e.first().trigger("lcl_clicked_elem", [l(this)]);
              })
          : (e.off("click"),
            e.on("click", function (t) {
              t.preventDefault(),
                p(e, l(this)),
                e.first().trigger("lcl_clicked_elem", [l(this)]);
            }))),
      l(document).on(
        "click",
        "#lcl_overlay:not(.lcl_modal), .lcl_close, #lcl_corner_close",
        function (l) {
          if (e != lcl_curr_obj) return !0;
          E();
        }
      ),
      l(document).on("click", ".lcl_prev", function (l) {
        if (e != lcl_curr_obj) return !0;
        I("prev");
      }),
      l(document).on("click", ".lcl_next", function (l) {
        if (e != lcl_curr_obj) return !0;
        I("next");
      }),
      l(document).bind("keydown", function (t) {
        if (lcl_shown) {
          if (e != lcl_curr_obj) return !0;
          39 == t.keyCode
            ? (t.preventDefault(), I("next"))
            : 37 == t.keyCode
            ? (t.preventDefault(), I("prev"))
            : 27 == t.keyCode
            ? (t.preventDefault(), E())
            : 122 == t.keyCode &&
              _.fullscreen &&
              ("undefined" != typeof lcl_fs_key_timeout &&
                clearTimeout(lcl_fs_key_timeout),
              (lcl_fs_key_timeout = setTimeout(function () {
                l(".lcl_fullscreen_mode").length ? O() : F();
              }, 50)));
        }
      }),
      l(document).on(
        "wheel",
        "#lcl_overlay, #lcl_window, #lcl_thumbs_nav:not(.lcl_tn_has_arr)",
        function (t) {
          if (e != lcl_curr_obj || !lcl_curr_opts.mousewheel) return !0;
          var c = l(t.target);
          if (c.is("#lcl_window") || c.parents("#lcl_window").length) {
            var n = !0;
            for (a = 0; a < 20 && !c.is("#lcl_window"); a++) {
              if (c[0].scrollHeight > c.outerHeight()) {
                n = !1;
                break;
              }
              c = c.parent();
            }
            if (n) {
              t.preventDefault();
              _ = t.originalEvent.deltaY;
              I(_ > 0 ? "next" : "prev");
            }
          } else {
            t.preventDefault();
            var _ = t.originalEvent.deltaY;
            I(_ > 0 ? "next" : "prev");
          }
        }
      ),
      l(document).on("click", ".lcl_image_elem", function (t) {
        if (e != lcl_curr_obj) return !0;
        lcl_img_click_track = setTimeout(function () {
          l(".lcl_zoom_wrap").length || I("next");
        }, 250);
      }),
      l(document).on("dblclick", ".lcl_image_elem", function (t) {
        return (
          e != lcl_curr_obj ||
          !lcl_curr_opts.img_zoom ||
          !l(".lcl_zoom_icon").length ||
          void (
            "undefined" != typeof lcl_img_click_track &&
            (clearTimeout(lcl_img_click_track), zoom(!0))
          )
        );
      }),
      l(document).on("click", ".lcl_txt_toggle", function (t) {
        if (e != lcl_curr_obj) return !0;
        var c = _;
        if (
          !lcl_is_active &&
          !l(".lcl_no_txt").length &&
          !l(".lcl_toggling_txt").length
        )
          if ("over" != c.data_position) {
            var n = "rside" == c.data_position || "lside" == c.data_position,
              o = l(".lcl_force_txt_over").length,
              i = c.animation_time < 150 ? c.animation_time : 150,
              r = 0;
            n && !o
              ? l("#lcl_subj").fadeTo(i, 0)
              : o || (l("#lcl_contents_wrap").fadeTo(i, 0), (r = i)),
              setTimeout(function () {
                l("#lcl_wrap").toggleClass("lcl_hidden_txt");
              }, r),
              o ||
                ((lcl_is_active = !0),
                l("#lcl_wrap").addClass("lcl_toggling_txt"),
                setTimeout(function () {
                  (lcl_is_active = !1), lcl_resize();
                }, c.animation_time),
                setTimeout(function () {
                  l("#lcl_wrap").removeClass("lcl_toggling_txt"),
                    n && !o
                      ? l("#lcl_subj").fadeTo(i, 1)
                      : o || l("#lcl_contents_wrap").fadeTo(i, 1);
                }, 2 * c.animation_time + 50));
          } else l("#lcl_wrap").toggleClass("lcl_hidden_txt");
      }),
      l(document).on("click", ".lcl_play", function (t) {
        if (e != lcl_curr_obj) return !0;
        l(".lcl_is_playing").length
          ? lcl_stop_slideshow()
          : lcl_start_slideshow();
      }),
      l(document).on("click", ".lcl_elem", function (t) {
        if (e != lcl_curr_obj) return !0;
        l(".lcl_playing_video").length ||
          -1 === l.inArray(l("#lcl_wrap").attr("lcl-type"), ["video"]) ||
          (lcl_stop_slideshow(), l("#lcl_wrap").addClass("lcl_playing_video"));
      });
    l(document).on("click", ".lcl_socials", function (t) {
      if (e != lcl_curr_obj) return !0;
      if (l(".lcl_socials > div").length)
        l(".lcl_socials_tt").removeClass("lcl_show_tt"),
          setTimeout(function () {
            l(".lcl_socials").removeClass("lcl_socials_shown").empty();
          }, 260);
      else {
        var c = lcl_curr_vars.elems[lcl_curr_vars.elem_index],
          n = encodeURIComponent(window.location.href),
          _ = encodeURIComponent(c.title).replace(/'/g, "\\'"),
          o = encodeURIComponent(c.txt).replace(/'/g, "\\'");
        if ("image" == c.type) var i = c.src;
        else
          (i = !!c.poster && c.poster) ||
            void 0 === c.vid_poster ||
            (i = c.vid_poster);
        var r = '<div class="lcl_socials_tt lcl_tooltip lcl_tt_bottom">';
        if (lcl_curr_opts.fb_share_params) {
          var s = n;
          (s += -1 === window.location.href.indexOf("?") ? "%3F" : "%26"),
            (r +=
              '<a class="lcl_icon lcl_fb" onClick="window.open(\'https://www.facebook.com/sharer?u=' +
              (s += encodeURIComponent(
                lcl_curr_opts.fb_share_params
                  .replace("%TITLE%", _)
                  .replace("%DESCR%", o)
                  .replace("%IMG%", i)
              )) +
              "&display=popup','sharer','toolbar=0,status=0,width=590,height=500');\" href=\"javascript: void(0)\"></a>");
        } else
          r +=
            '<a class="lcl_icon lcl_fb" onClick="window.open(\'https://www.facebook.com/sharer?u=' +
            n +
            "&display=popup','sharer','toolbar=0,status=0,width=590,height=325');\" href=\"javascript: void(0)\"></a>";
        (r +=
          '<a class="lcl_icon lcl_twit" onClick="window.open(\'https://twitter.com/share?text=Check%20out%20%22' +
          _ +
          "%22%20@&url=" +
          n +
          "','sharer','toolbar=0,status=0,width=548,height=325');\" href=\"javascript: void(0)\"></a>"),
          lcl_on_mobile &&
            (r +=
              '<br/><a class="lcl_icon lcl_wa" href="whatsapp://send?text=' +
              n +
              '" data-action="share/whatsapp/share"></a>'),
          i &&
            (r +=
              '<a class="lcl_icon lcl_pint" onClick="window.open(\'http://pinterest.com/pin/create/button/?url=' +
              n +
              "&media=" +
              encodeURIComponent(i) +
              "&description=" +
              _ +
              "','sharer','toolbar=0,status=0,width=575,height=330');\" href=\"javascript: void(0)\"></a>"),
          (r += "</div>"),
          l(".lcl_socials").addClass("lcl_socials_shown").html(r),
          setTimeout(function () {
            l(".lcl_socials_tt").addClass("lcl_show_tt");
          }, 20),
          lcl_curr_opts.fb_direct_share &&
            l(document)
              .off("click", ".lcl_fb")
              .on("click", ".lcl_fb", function (l) {
                FB.ui(
                  {
                    method: "share_open_graph",
                    action_type: "og.shares",
                    action_properties: JSON.stringify({
                      object: {
                        "og:url": window.location.href,
                        "og:title": c.title,
                        "og:description": c.txt,
                        "og:image": i,
                      },
                    }),
                  },
                  function (l) {
                    window.close();
                  }
                );
              });
      }
    }),
      l(document).on("click", ".lcl_fullscreen", function (t) {
        if (e != lcl_curr_obj) return !0;
        l(".lcl_fullscreen_mode").length ? O(!0) : F(!0);
      }),
      l(document).on("click", ".lcl_thumbs_toggle", function (t) {
        if (e != lcl_curr_obj) return !0;
        var c = l(".lcl_fullscreen_mode").length;
        l("#lcl_wrap").addClass("lcl_toggling_tn").toggleClass("lcl_tn_hidden"),
          c ||
            setTimeout(function () {
              lcl_resize();
            }, 160),
          setTimeout(function () {
            l("#lcl_wrap").removeClass("lcl_toggling_tn");
          }, lcl_curr_opts.animation_time + 50);
      });
    var U = lcl_on_mobile ? " click" : "";
    l(document).on("lcl_tn_elem_click" + U, ".lcl_tn_inner > li", function (t) {
      if (e != lcl_curr_obj) return !0;
      var c = l(this).attr("rel");
      I(c);
    }),
      l(document).on(
        "click",
        ".lcl_tn_prev:not(.lcl_tn_disabled_arr)",
        function (t) {
          if (e != lcl_curr_obj) return !0;
          l(".lcl_tn_inner")
            .stop(!0)
            .animate(
              {
                scrollLeft:
                  l(".lcl_tn_inner").scrollLeft() - lcl_curr_opts.thumbs_w - 10,
              },
              300,
              "linear",
              function () {
                l(".lcl_tn_inner").trigger("lcl_smoothscroll_end");
              }
            );
        }
      ),
      l(document).on(
        "click",
        ".lcl_tn_next:not(.lcl_tn_disabled_arr)",
        function (t) {
          if (e != lcl_curr_obj) return !0;
          l(".lcl_tn_inner")
            .stop(!0)
            .animate(
              {
                scrollLeft:
                  l(".lcl_tn_inner").scrollLeft() + lcl_curr_opts.thumbs_w + 10,
              },
              300,
              "linear",
              function () {
                l(".lcl_tn_inner").trigger("lcl_smoothscroll_end");
              }
            );
        }
      ),
      l(document).on("wheel", "#lcl_thumbs_nav.lcl_tn_has_arr", function (t) {
        if (e != lcl_curr_obj) return !0;
        t.preventDefault(),
          t.originalEvent.deltaY > 0
            ? l(".lcl_tn_prev:not(.lcl_tn_disabled_arr)").trigger("click")
            : l(".lcl_tn_next:not(.lcl_tn_disabled_arr)").trigger("click");
      }),
      l(document).on("contextmenu", "#lcl_wrap *", function () {
        return e != lcl_curr_obj || (!_.rclick_prevent && void 0);
      }),
      l(window).on("touchmove", function (t) {
        l(t.target);
        return (
          !lcl_shown ||
          !lcl_on_mobile ||
          e != lcl_curr_obj ||
          void (
            l(t.target).parents("#lcl_window").length ||
            l(t.target).parents("#lcl_thumbs_nav").length ||
            t.preventDefault()
          )
        );
      });
    var Q = function () {
        if ("function" != typeof AlloyFinger) return !1;
        lcl_is_pinching = !1;
        var e = document.querySelector("#lcl_wrap");
        new AlloyFinger(e, {
          singleTap: function (e) {
            "lcl_overlay" != l(e.target).attr("id") || _.modal || lcl_close();
          },
          doubleTap: function (l) {
            l.preventDefault(), zoom(!0);
          },
          pinch: function (l) {
            l.preventDefault(),
              (lcl_is_pinching = !0),
              "undefined" != typeof lcl_swipe_delay &&
                clearTimeout(lcl_swipe_delay),
              "undefined" != typeof lcl_pinch_delay &&
                clearTimeout(lcl_pinch_delay),
              (lcl_pinch_delay = setTimeout(function () {
                l.scale > 1.2 ? zoom(!0) : l.scale < 0.8 && zoom(!1),
                  setTimeout(function () {
                    lcl_is_pinching = !1;
                  }, 300);
              }, 20));
          },
          touchStart: function (l) {
            lcl_touchstartX = l.changedTouches[0].clientX;
          },
          touchEnd: function (e) {
            var t = lcl_touchstartX - e.changedTouches[0].clientX;
            if ((t < -50 || t > 50) && !lcl_is_pinching) {
              if (l(e.target).parents("#lcl_thumbs_nav").length) return !1;
              if (l(e.target).parents(".lcl_zoom_wrap").length) return !1;
              var c = l(e.target).parents(".lcl_zoomable").length ? 250 : 0;
              "undefined" != typeof lcl_swipe_delay &&
                clearTimeout(lcl_swipe_delay),
                (lcl_swipe_delay = setTimeout(function () {
                  I(t < -50 ? "prev" : "next");
                }, c));
            }
          },
        });
      },
      Y = function () {
        return (
          !!lcl_curr_obj &&
          ((o = l.data(lcl_curr_obj, "lcl_vars")),
          (_ = l.data(lcl_curr_obj, "lcl_settings")),
          !!o || (console.error("LC Lightbox. Object not initialized"), !1))
        );
      };
    return (
      (lcl_open = function (e, t) {
        var c = (o = l.data(e, "lcl_vars"));
        return c
          ? void 0 === c.elems[t]
            ? (console.error("LC Lightbox - cannot open. Unexisting index"), !1)
            : ((c.elem_index = t),
              ($clicked_obj = !c.is_arr_instance && l(e[t])),
              p(e, $clicked_obj))
          : (console.error("LC Lightbox - cannot open. Object not initialized"),
            !1);
      }),
      (lcl_resize = function () {
        if (!lcl_shown || lcl_is_active || !Y()) return !1;
        var e = o;
        "undefined" != typeof lcl_size_check && clearTimeout(lcl_size_check),
          (lcl_size_check = setTimeout(function () {
            l("#lcl_wrap").addClass("lcl_is_resizing"), q();
            var t = e.elems[e.elem_index];
            return C(t);
          }, 20));
      }),
      (lcl_close = function () {
        return !(!lcl_shown || lcl_is_active || !Y()) && E();
      }),
      (lcl_switch = function (l) {
        return !(!lcl_shown || lcl_is_active || !Y()) && I(l);
      }),
      (lcl_start_slideshow = function (e) {
        if (
          !lcl_shown ||
          (void 0 === e && "undefined" != typeof lcl_slideshow) ||
          !Y()
        )
          return !1;
        var t = _;
        if (!t.carousel && o.elem_index == o.elems.length - 1) return !1;
        "undefined" != typeof lcl_slideshow && clearInterval(lcl_slideshow),
          l("#lcl_wrap").addClass("lcl_is_playing");
        var c = t.animation_time + t.slideshow_time;
        (L(!0),
        (lcl_slideshow = setInterval(function () {
          L(!1), I("next", !0);
        }, c)),
        void 0 === e) &&
          ("function" == typeof t.slideshow_start &&
            t.slideshow_start.call(null, t, o),
          o.is_arr_instance ||
            (o.elems_selector ? l(o.elems_selector) : lcl_curr_obj)
              .first()
              .trigger("lcl_slideshow_start", [c]));
        return !0;
      }),
      (lcl_stop_slideshow = function () {
        if (!lcl_shown || "undefined" == typeof lcl_slideshow || !Y())
          return !1;
        var e = _;
        if (!e) return console.error("LC Lightbox. Object not initialized"), !1;
        (clearInterval(lcl_slideshow),
        (lcl_slideshow = void 0),
        l("#lcl_wrap").removeClass("lcl_is_playing"),
        l("#lcl_progressbar")
          .stop(!0)
          .animate(
            { marginTop: -3 * l("#lcl_progressbar").height() },
            300,
            function () {
              l(this).remove();
            }
          ),
        "function" == typeof e.slideshow_end &&
          e.slideshow_end.call(null, _, o),
        o.is_arr_instance) ||
          (o.elems_selector ? l(o.elems_selector) : lcl_curr_obj)
            .first()
            .trigger("lcl_slideshow_end", []);
        return !0;
      }),
      e
    );
  };
})(jQuery);