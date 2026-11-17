const assert = require('assert');
const { test } = require('node:test');
const { formatWaktu, getOutputText } = require('../script.js');

test('formatWaktu returns valid formatted time string', () => {
    const timeStr = formatWaktu(new Date('2026-01-01T10:00:00'));
    assert.ok(timeStr.length > 0);
    assert.strictEqual(typeof timeStr, 'string');
});

test('getOutputText formats message correctly with timestamp', () => {
    const time = '10.00.00';
    const message = getOutputText(time);
    assert.strictEqual(message, 'Berhasil diklik pada 10.00.00');
});
