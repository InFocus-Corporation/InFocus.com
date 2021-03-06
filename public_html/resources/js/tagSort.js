;
! function(e) {
    e.fn.tagSort = function(t) {
        var a = {
            selector: ".item-tagsort",
            tagWrapper: "span",
            tagClassPrefix: !1,
            displaySelector: !1,
            displaySeperator: " ",
            sortType: "exclusive",
            fadeTime: 200
        };
        t = e.extend(a, t);
        var s = {
            generateTags: function(a) {
                var i = {},
                    n = {
                        elements: [],
                        tags: []
                    },
                    r = e(document.createElement(t.tagWrapper));
                return a.each(function(a) {
                    $element = e(this);
                    var o = $element.data("item-tags"),
                        c = o.match(/,\s+/) ? o.split(", ") : o.split(",");
                    e.each(c, function(e, a) {
						if(a != ""){
                        var n = a.toLowerCase();
                        i[n] || (i[n] = [], s.container.append(t.tagClassPrefix !== !1 ? r.clone().text(a).addClass((t.tagClassPrefix + a.toLowerCase()).replace(/[!\"#$%&'\(\)\*\+,\.\/:;<=>\?\@\[\\\]\^`\{\|\}~]/g, "")) : r.clone().text(a))), t.displaySelector !== !1 && $element.find(t.displaySelector).append(e > 0 ? t.displaySeperator + a : a), i[n].push($element)
				}}), n.elements.push($element), n.tags.push(c)
                }), "inclusive" == t.sortType ? i : "exclusive" == t.sortType ? n : "single" == t.sortType ? i : void 0
            },
            exclusiveSort: function(t, a) {
                var i = [
                    [],
                    []
                ];
                return e.each(t.elements, function(a, n) {
                    var r = !0;
                    s.container.find(".tagsort-active").each(function(s) {
                        -1 == t.tags[a].indexOf(e(this).text()) && (r = !1, i[0].push(n))
                    }), 1 == r && i[1].push(n)
                }), i
            },
            inclusiveSort: function(t, a) {
                var i = [
                    [],
                    []
                ];
                return s.container.find(".tagsort-active").each(function(a) {
                    e.each(t[e(this).text().toLowerCase()], function(e, t) {
                        i[1].push(t)
                    })
                }), i
            },
            showElements: function(a) {
                e.each(a, function(e, a) {
                    a.is("visible") || a.fadeIn(t.fadeTime)
                })
            },
            hideElements: function(a) {
                e.each(a, function(e, a) {
                    a.is("visible") && a.fadeOut(t.fadeTime)
                })
            },
            inititalize: function(a) {
                s.container = a, s.container.addClass("tagsort-tags-container");
                var i = e(t.selector);
                s.tags = s.generateTags(i, s.container);
                var n = s.container.find(t.tagWrapper);
                n.click(function() {
                    var a = n.hasClass("tagsort-active");
                    if (a || i.fadeIn(t.fadeTime), i.fadeOut(t.fadeTime), "single" == t.sortType)
                        if (e(this).hasClass("tagsort-active")) i.fadeIn(t.fadeTime), e(this).removeClass("tagsort-active");
                        else {
                            e(".tagsort-active").removeClass("tagsort-active"), e(this).toggleClass("tagsort-active");
                            var r = s.inclusiveSort(s.tags, i)
                        } else {
                        e(this).toggleClass("tagsort-active");
                        var r = "inclusive" == t.sortType ? s.inclusiveSort(s.tags, i) : s.exclusiveSort(s.tags, i)
                    }
                    r[0].length > 0 && s.hideElements(r[0]), r[1].length > 0 && s.showElements(r[1])
                })
            }
        };
        return s.inititalize(this), e(this)
    }
}(jQuery);