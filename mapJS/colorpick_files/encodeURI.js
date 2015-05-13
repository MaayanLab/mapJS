/**
 * Substitute for missing functions encodeURI() and encodeURIComponent()
 *
 * @license http://www.gnu.org/copyleft/gpl.html  GNU General Public License
 * @author Jan Odvárko, http://odvarko.cz
 */

if(typeof encodeURI == 'undefined') {
	function encodeURI(str) {
		return encodeURICommon(str,
		'!#$&\'()*+,-./0123456789:;=?@ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz~')
	}
}

if(typeof encodeURIComponent == 'undefined') {
	function encodeURIComponent(str) {
		return encodeURICommon(str,
		'!\'()*-.0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz~')
	}
}

function encodeURICommon(str, keep) {
	function hex(code) {
		return '%'+(0x100+code).toString(16).substr(1).toUpperCase()
	}
	for(var i=0,out=''; i<str.length; i++) {
		var chr=str.charAt(i), code=str.charCodeAt(i)
		switch(true) {
			case keep.indexOf(chr) >= 0: out = out + chr
				break
			case code < 128: out = out + hex(code)
				break
			case code > 127 && code < 2048: out = out +
				hex(0xC0 | (code >> 6)) +
				hex(0x80 | (code & 0x3F))
				break
			case code > 2047 && code < 65536: out = out +
				hex(0xE0 | (code >> 12)) +
				hex(0x80 | (code >> 6 & 0x3F)) +
				hex(0x80 | (code & 0x3F))
				break
			case code > 65535: out = out +
				hex(0xF0 | (code >> 18)) +
				hex(0x80 | (code >> 12 & 0x3F)) +
				hex(0x80 | (code >> 6 & 0x3F)) +
				hex(0x80 | (code & 0x3F))
				break
		}
	}
	return out
}
