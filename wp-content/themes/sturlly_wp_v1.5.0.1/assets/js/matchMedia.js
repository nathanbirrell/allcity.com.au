if (!(window.matchMedia)) {

    window.matchMedia = (function (doc, undefined) {

        var cache = {},
            docElem = doc.documentElement,
            fakeBody = doc.createElement('body'),
            testDiv = doc.createElement('div');

        testDiv.setAttribute('id', 'ejs-qtest');
        fakeBody.appendChild(testDiv);

        return function (q) {
            if (cache[q] === undefined) {
                var styleBlock = doc.createElement('style');
                var cssrule = '@media ' + q + ' { #ejs-qtest { position: absolute; } }';
                if (styleBlock.styleSheet) {
                    styleBlock.styleSheet.cssText = cssrule;
                    // IE8 does not seem to support the styleSheet property nor appendChild with style elements:
                } else if (styleBlock.canHaveHTML === false) {
                    styleBlock.text = cssrule;
                } else {
                    styleBlock.appendChild(doc.createTextNode(cssrule));
                }
                docElem.insertBefore(fakeBody, docElem.firstChild);
                docElem.insertBefore(styleBlock, docElem.firstChild);
                cache[q] = ((window.getComputedStyle ? window.getComputedStyle(testDiv, null) : testDiv.currentStyle)['position'] == 'absolute');
                docElem.removeChild(fakeBody);
                docElem.removeChild(styleBlock);
            }
            return cache[q];
        };

    })(document);

}