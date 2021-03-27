let $buoop = {
    required: {
        e: {$IEVersion},
        f: {$FFVersion},
        o: {$OperaVersion},
        s: {$SafariVersion},
        c: {$ChromeVersion}
    },
    insecure: {$Insecure},
    unsupported: {$Unsupported},
    api: 2021.03
};

function $buo_f() {
    var e = document.createElement("script");
    e.src = "//browser-update.org/update.min.js";
    document.body.appendChild(e);
};
try {
    document.addEventListener("DOMContentLoaded", $buo_f, false)
} catch (e) {
    window.attachEvent("onload", $buo_f)
}
