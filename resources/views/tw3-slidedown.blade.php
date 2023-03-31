<!DOCTYPE html>
<html lang="en" x-cloak x-data="{ darkMode: localStorage.getItem('darkTw3') === 'true' }" x-init="$watch('darkMode', val => localStorage.setItem('darkTw3', val))" x-bind:class="{ 'dark': darkMode }">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tailwind 3 Tables</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script>
        const defaultTheme = {
            content: [],
            presets: [],
            darkMode: 'media', // or 'class'
            theme: {
                accentColor: ({
                    theme
                }) => ({
                    ...theme('colors'),
                    auto: 'auto',
                }),
                animation: {
                    none: 'none',
                    spin: 'spin 1s linear infinite',
                    ping: 'ping 1s cubic-bezier(0, 0, 0.2, 1) infinite',
                    pulse: 'pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    bounce: 'bounce 1s infinite',
                },
                aria: {
                    checked: 'checked="true"',
                    disabled: 'disabled="true"',
                    expanded: 'expanded="true"',
                    hidden: 'hidden="true"',
                    pressed: 'pressed="true"',
                    readonly: 'readonly="true"',
                    required: 'required="true"',
                    selected: 'selected="true"',
                },
                aspectRatio: {
                    auto: 'auto',
                    square: '1 / 1',
                    video: '16 / 9',
                },
                backdropBlur: ({
                    theme
                }) => theme('blur'),
                backdropBrightness: ({
                    theme
                }) => theme('brightness'),
                backdropContrast: ({
                    theme
                }) => theme('contrast'),
                backdropGrayscale: ({
                    theme
                }) => theme('grayscale'),
                backdropHueRotate: ({
                    theme
                }) => theme('hueRotate'),
                backdropInvert: ({
                    theme
                }) => theme('invert'),
                backdropOpacity: ({
                    theme
                }) => theme('opacity'),
                backdropSaturate: ({
                    theme
                }) => theme('saturate'),
                backdropSepia: ({
                    theme
                }) => theme('sepia'),
                backgroundColor: ({
                    theme
                }) => theme('colors'),
                backgroundImage: {
                    none: 'none',
                    'gradient-to-t': 'linear-gradient(to top, var(--tw-gradient-stops))',
                    'gradient-to-tr': 'linear-gradient(to top right, var(--tw-gradient-stops))',
                    'gradient-to-r': 'linear-gradient(to right, var(--tw-gradient-stops))',
                    'gradient-to-br': 'linear-gradient(to bottom right, var(--tw-gradient-stops))',
                    'gradient-to-b': 'linear-gradient(to bottom, var(--tw-gradient-stops))',
                    'gradient-to-bl': 'linear-gradient(to bottom left, var(--tw-gradient-stops))',
                    'gradient-to-l': 'linear-gradient(to left, var(--tw-gradient-stops))',
                    'gradient-to-tl': 'linear-gradient(to top left, var(--tw-gradient-stops))',
                },
                backgroundOpacity: ({
                    theme
                }) => theme('opacity'),
                backgroundPosition: {
                    bottom: 'bottom',
                    center: 'center',
                    left: 'left',
                    'left-bottom': 'left bottom',
                    'left-top': 'left top',
                    right: 'right',
                    'right-bottom': 'right bottom',
                    'right-top': 'right top',
                    top: 'top',
                },
                backgroundSize: {
                    auto: 'auto',
                    cover: 'cover',
                    contain: 'contain',
                },
                blur: {
                    0: '0',
                    none: '0',
                    sm: '4px',
                    DEFAULT: '8px',
                    md: '12px',
                    lg: '16px',
                    xl: '24px',
                    '2xl': '40px',
                    '3xl': '64px',
                },
                borderColor: ({
                    theme
                }) => ({
                    ...theme('colors'),
                    DEFAULT: theme('colors.gray.200', 'currentColor'),
                }),
                borderOpacity: ({
                    theme
                }) => theme('opacity'),
                borderRadius: {
                    none: '0px',
                    sm: '0.125rem',
                    DEFAULT: '0.25rem',
                    md: '0.375rem',
                    lg: '0.5rem',
                    xl: '0.75rem',
                    '2xl': '1rem',
                    '3xl': '1.5rem',
                    full: '9999px',
                },
                borderSpacing: ({
                    theme
                }) => ({
                    ...theme('spacing'),
                }),
                borderWidth: {
                    DEFAULT: '1px',
                    0: '0px',
                    2: '2px',
                    4: '4px',
                    8: '8px',
                },
                boxShadow: {
                    sm: '0 1px 2px 0 rgb(0 0 0 / 0.05)',
                    DEFAULT: '0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1)',
                    md: '0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1)',
                    lg: '0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1)',
                    xl: '0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1)',
                    '2xl': '0 25px 50px -12px rgb(0 0 0 / 0.25)',
                    inner: 'inset 0 2px 4px 0 rgb(0 0 0 / 0.05)',
                    none: 'none',
                },
                boxShadowColor: ({
                    theme
                }) => theme('colors'),
                brightness: {
                    0: '0',
                    50: '.5',
                    75: '.75',
                    90: '.9',
                    95: '.95',
                    100: '1',
                    105: '1.05',
                    110: '1.1',
                    125: '1.25',
                    150: '1.5',
                    200: '2',
                },
                caretColor: ({
                    theme
                }) => theme('colors'),
                colors: ({
                    colors
                }) => ({
                    inherit: colors.inherit,
                    current: colors.current,
                    transparent: colors.transparent,
                    black: colors.black,
                    white: colors.white,
                    slate: colors.slate,
                    gray: colors.gray,
                    zinc: colors.zinc,
                    neutral: colors.neutral,
                    stone: colors.stone,
                    red: colors.red,
                    orange: colors.orange,
                    amber: colors.amber,
                    yellow: colors.yellow,
                    lime: colors.lime,
                    green: colors.green,
                    emerald: colors.emerald,
                    teal: colors.teal,
                    cyan: colors.cyan,
                    sky: colors.sky,
                    blue: colors.blue,
                    indigo: colors.indigo,
                    violet: colors.violet,
                    purple: colors.purple,
                    fuchsia: colors.fuchsia,
                    pink: colors.pink,
                    rose: colors.rose,
                }),
                columns: {
                    auto: 'auto',
                    1: '1',
                    2: '2',
                    3: '3',
                    4: '4',
                    5: '5',
                    6: '6',
                    7: '7',
                    8: '8',
                    9: '9',
                    10: '10',
                    11: '11',
                    12: '12',
                    '3xs': '16rem',
                    '2xs': '18rem',
                    xs: '20rem',
                    sm: '24rem',
                    md: '28rem',
                    lg: '32rem',
                    xl: '36rem',
                    '2xl': '42rem',
                    '3xl': '48rem',
                    '4xl': '56rem',
                    '5xl': '64rem',
                    '6xl': '72rem',
                    '7xl': '80rem',
                },
                container: {},
                content: {
                    none: 'none',
                },
                contrast: {
                    0: '0',
                    50: '.5',
                    75: '.75',
                    100: '1',
                    125: '1.25',
                    150: '1.5',
                    200: '2',
                },
                cursor: {
                    auto: 'auto',
                    default: 'default',
                    pointer: 'pointer',
                    wait: 'wait',
                    text: 'text',
                    move: 'move',
                    help: 'help',
                    'not-allowed': 'not-allowed',
                    none: 'none',
                    'context-menu': 'context-menu',
                    progress: 'progress',
                    cell: 'cell',
                    crosshair: 'crosshair',
                    'vertical-text': 'vertical-text',
                    alias: 'alias',
                    copy: 'copy',
                    'no-drop': 'no-drop',
                    grab: 'grab',
                    grabbing: 'grabbing',
                    'all-scroll': 'all-scroll',
                    'col-resize': 'col-resize',
                    'row-resize': 'row-resize',
                    'n-resize': 'n-resize',
                    'e-resize': 'e-resize',
                    's-resize': 's-resize',
                    'w-resize': 'w-resize',
                    'ne-resize': 'ne-resize',
                    'nw-resize': 'nw-resize',
                    'se-resize': 'se-resize',
                    'sw-resize': 'sw-resize',
                    'ew-resize': 'ew-resize',
                    'ns-resize': 'ns-resize',
                    'nesw-resize': 'nesw-resize',
                    'nwse-resize': 'nwse-resize',
                    'zoom-in': 'zoom-in',
                    'zoom-out': 'zoom-out',
                },
                divideColor: ({
                    theme
                }) => theme('borderColor'),
                divideOpacity: ({
                    theme
                }) => theme('borderOpacity'),
                divideWidth: ({
                    theme
                }) => theme('borderWidth'),
                dropShadow: {
                    sm: '0 1px 1px rgb(0 0 0 / 0.05)',
                    DEFAULT: ['0 1px 2px rgb(0 0 0 / 0.1)', '0 1px 1px rgb(0 0 0 / 0.06)'],
                    md: ['0 4px 3px rgb(0 0 0 / 0.07)', '0 2px 2px rgb(0 0 0 / 0.06)'],
                    lg: ['0 10px 8px rgb(0 0 0 / 0.04)', '0 4px 3px rgb(0 0 0 / 0.1)'],
                    xl: ['0 20px 13px rgb(0 0 0 / 0.03)', '0 8px 5px rgb(0 0 0 / 0.08)'],
                    '2xl': '0 25px 25px rgb(0 0 0 / 0.15)',
                    none: '0 0 #0000',
                },
                fill: ({
                    theme
                }) => ({
                    none: 'none',
                    ...theme('colors'),
                }),
                flex: {
                    1: '1 1 0%',
                    auto: '1 1 auto',
                    initial: '0 1 auto',
                    none: 'none',
                },
                flexBasis: ({
                    theme
                }) => ({
                    auto: 'auto',
                    ...theme('spacing'),
                    '1/2': '50%',
                    '1/3': '33.333333%',
                    '2/3': '66.666667%',
                    '1/4': '25%',
                    '2/4': '50%',
                    '3/4': '75%',
                    '1/5': '20%',
                    '2/5': '40%',
                    '3/5': '60%',
                    '4/5': '80%',
                    '1/6': '16.666667%',
                    '2/6': '33.333333%',
                    '3/6': '50%',
                    '4/6': '66.666667%',
                    '5/6': '83.333333%',
                    '1/12': '8.333333%',
                    '2/12': '16.666667%',
                    '3/12': '25%',
                    '4/12': '33.333333%',
                    '5/12': '41.666667%',
                    '6/12': '50%',
                    '7/12': '58.333333%',
                    '8/12': '66.666667%',
                    '9/12': '75%',
                    '10/12': '83.333333%',
                    '11/12': '91.666667%',
                    full: '100%',
                }),
                flexGrow: {
                    0: '0',
                    DEFAULT: '1',
                },
                flexShrink: {
                    0: '0',
                    DEFAULT: '1',
                },
                fontFamily: {
                    sans: [
                        'ui-sans-serif',
                        'system-ui',
                        '-apple-system',
                        'BlinkMacSystemFont',
                        '"Segoe UI"',
                        'Roboto',
                        '"Helvetica Neue"',
                        'Arial',
                        '"Noto Sans"',
                        'sans-serif',
                        '"Apple Color Emoji"',
                        '"Segoe UI Emoji"',
                        '"Segoe UI Symbol"',
                        '"Noto Color Emoji"',
                    ],
                    serif: ['ui-serif', 'Georgia', 'Cambria', '"Times New Roman"', 'Times', 'serif'],
                    mono: [
                        'ui-monospace',
                        'SFMono-Regular',
                        'Menlo',
                        'Monaco',
                        'Consolas',
                        '"Liberation Mono"',
                        '"Courier New"',
                        'monospace',
                    ],
                },
                fontSize: {
                    xs: ['0.75rem', {
                        lineHeight: '1rem'
                    }],
                    sm: ['0.875rem', {
                        lineHeight: '1.25rem'
                    }],
                    base: ['1rem', {
                        lineHeight: '1.5rem'
                    }],
                    lg: ['1.125rem', {
                        lineHeight: '1.75rem'
                    }],
                    xl: ['1.25rem', {
                        lineHeight: '1.75rem'
                    }],
                    '2xl': ['1.5rem', {
                        lineHeight: '2rem'
                    }],
                    '3xl': ['1.875rem', {
                        lineHeight: '2.25rem'
                    }],
                    '4xl': ['2.25rem', {
                        lineHeight: '2.5rem'
                    }],
                    '5xl': ['3rem', {
                        lineHeight: '1'
                    }],
                    '6xl': ['3.75rem', {
                        lineHeight: '1'
                    }],
                    '7xl': ['4.5rem', {
                        lineHeight: '1'
                    }],
                    '8xl': ['6rem', {
                        lineHeight: '1'
                    }],
                    '9xl': ['8rem', {
                        lineHeight: '1'
                    }],
                },
                fontWeight: {
                    thin: '100',
                    extralight: '200',
                    light: '300',
                    normal: '400',
                    medium: '500',
                    semibold: '600',
                    bold: '700',
                    extrabold: '800',
                    black: '900',
                },
                gap: ({
                    theme
                }) => theme('spacing'),
                gradientColorStops: ({
                    theme
                }) => theme('colors'),
                grayscale: {
                    0: '0',
                    DEFAULT: '100%',
                },
                gridAutoColumns: {
                    auto: 'auto',
                    min: 'min-content',
                    max: 'max-content',
                    fr: 'minmax(0, 1fr)',
                },
                gridAutoRows: {
                    auto: 'auto',
                    min: 'min-content',
                    max: 'max-content',
                    fr: 'minmax(0, 1fr)',
                },
                gridColumn: {
                    auto: 'auto',
                    'span-1': 'span 1 / span 1',
                    'span-2': 'span 2 / span 2',
                    'span-3': 'span 3 / span 3',
                    'span-4': 'span 4 / span 4',
                    'span-5': 'span 5 / span 5',
                    'span-6': 'span 6 / span 6',
                    'span-7': 'span 7 / span 7',
                    'span-8': 'span 8 / span 8',
                    'span-9': 'span 9 / span 9',
                    'span-10': 'span 10 / span 10',
                    'span-11': 'span 11 / span 11',
                    'span-12': 'span 12 / span 12',
                    'span-full': '1 / -1',
                },
                gridColumnEnd: {
                    auto: 'auto',
                    1: '1',
                    2: '2',
                    3: '3',
                    4: '4',
                    5: '5',
                    6: '6',
                    7: '7',
                    8: '8',
                    9: '9',
                    10: '10',
                    11: '11',
                    12: '12',
                    13: '13',
                },
                gridColumnStart: {
                    auto: 'auto',
                    1: '1',
                    2: '2',
                    3: '3',
                    4: '4',
                    5: '5',
                    6: '6',
                    7: '7',
                    8: '8',
                    9: '9',
                    10: '10',
                    11: '11',
                    12: '12',
                    13: '13',
                },
                gridRow: {
                    auto: 'auto',
                    'span-1': 'span 1 / span 1',
                    'span-2': 'span 2 / span 2',
                    'span-3': 'span 3 / span 3',
                    'span-4': 'span 4 / span 4',
                    'span-5': 'span 5 / span 5',
                    'span-6': 'span 6 / span 6',
                    'span-full': '1 / -1',
                },
                gridRowEnd: {
                    auto: 'auto',
                    1: '1',
                    2: '2',
                    3: '3',
                    4: '4',
                    5: '5',
                    6: '6',
                    7: '7',
                },
                gridRowStart: {
                    auto: 'auto',
                    1: '1',
                    2: '2',
                    3: '3',
                    4: '4',
                    5: '5',
                    6: '6',
                    7: '7',
                },
                gridTemplateColumns: {
                    none: 'none',
                    1: 'repeat(1, minmax(0, 1fr))',
                    2: 'repeat(2, minmax(0, 1fr))',
                    3: 'repeat(3, minmax(0, 1fr))',
                    4: 'repeat(4, minmax(0, 1fr))',
                    5: 'repeat(5, minmax(0, 1fr))',
                    6: 'repeat(6, minmax(0, 1fr))',
                    7: 'repeat(7, minmax(0, 1fr))',
                    8: 'repeat(8, minmax(0, 1fr))',
                    9: 'repeat(9, minmax(0, 1fr))',
                    10: 'repeat(10, minmax(0, 1fr))',
                    11: 'repeat(11, minmax(0, 1fr))',
                    12: 'repeat(12, minmax(0, 1fr))',
                },
                gridTemplateRows: {
                    none: 'none',
                    1: 'repeat(1, minmax(0, 1fr))',
                    2: 'repeat(2, minmax(0, 1fr))',
                    3: 'repeat(3, minmax(0, 1fr))',
                    4: 'repeat(4, minmax(0, 1fr))',
                    5: 'repeat(5, minmax(0, 1fr))',
                    6: 'repeat(6, minmax(0, 1fr))',
                },
                height: ({
                    theme
                }) => ({
                    auto: 'auto',
                    ...theme('spacing'),
                    '1/2': '50%',
                    '1/3': '33.333333%',
                    '2/3': '66.666667%',
                    '1/4': '25%',
                    '2/4': '50%',
                    '3/4': '75%',
                    '1/5': '20%',
                    '2/5': '40%',
                    '3/5': '60%',
                    '4/5': '80%',
                    '1/6': '16.666667%',
                    '2/6': '33.333333%',
                    '3/6': '50%',
                    '4/6': '66.666667%',
                    '5/6': '83.333333%',
                    full: '100%',
                    screen: '100vh',
                    min: 'min-content',
                    max: 'max-content',
                    fit: 'fit-content',
                }),
                hueRotate: {
                    0: '0deg',
                    15: '15deg',
                    30: '30deg',
                    60: '60deg',
                    90: '90deg',
                    180: '180deg',
                },
                inset: ({
                    theme
                }) => ({
                    auto: 'auto',
                    ...theme('spacing'),
                    '1/2': '50%',
                    '1/3': '33.333333%',
                    '2/3': '66.666667%',
                    '1/4': '25%',
                    '2/4': '50%',
                    '3/4': '75%',
                    full: '100%',
                }),
                invert: {
                    0: '0',
                    DEFAULT: '100%',
                },
                keyframes: {
                    spin: {
                        to: {
                            transform: 'rotate(360deg)',
                        },
                    },
                    ping: {
                        '75%, 100%': {
                            transform: 'scale(2)',
                            opacity: '0',
                        },
                    },
                    pulse: {
                        '50%': {
                            opacity: '.5',
                        },
                    },
                    bounce: {
                        '0%, 100%': {
                            transform: 'translateY(-25%)',
                            animationTimingFunction: 'cubic-bezier(0.8,0,1,1)',
                        },
                        '50%': {
                            transform: 'none',
                            animationTimingFunction: 'cubic-bezier(0,0,0.2,1)',
                        },
                    },
                },
                letterSpacing: {
                    tighter: '-0.05em',
                    tight: '-0.025em',
                    normal: '0em',
                    wide: '0.025em',
                    wider: '0.05em',
                    widest: '0.1em',
                },
                lineHeight: {
                    none: '1',
                    tight: '1.25',
                    snug: '1.375',
                    normal: '1.5',
                    relaxed: '1.625',
                    loose: '2',
                    3: '.75rem',
                    4: '1rem',
                    5: '1.25rem',
                    6: '1.5rem',
                    7: '1.75rem',
                    8: '2rem',
                    9: '2.25rem',
                    10: '2.5rem',
                },
                listStyleType: {
                    none: 'none',
                    disc: 'disc',
                    decimal: 'decimal',
                },
                margin: ({
                    theme
                }) => ({
                    auto: 'auto',
                    ...theme('spacing'),
                }),
                maxHeight: ({
                    theme
                }) => ({
                    ...theme('spacing'),
                    none: 'none',
                    full: '100%',
                    screen: '100vh',
                    min: 'min-content',
                    max: 'max-content',
                    fit: 'fit-content',
                }),
                maxWidth: ({
                    theme,
                    breakpoints
                }) => ({
                    none: 'none',
                    0: '0rem',
                    xs: '20rem',
                    sm: '24rem',
                    md: '28rem',
                    lg: '32rem',
                    xl: '36rem',
                    '2xl': '42rem',
                    '3xl': '48rem',
                    '4xl': '56rem',
                    '5xl': '64rem',
                    '6xl': '72rem',
                    '7xl': '80rem',
                    full: '100%',
                    min: 'min-content',
                    max: 'max-content',
                    fit: 'fit-content',
                    prose: '65ch',
                    ...breakpoints(theme('screens')),
                }),
                minHeight: {
                    0: '0px',
                    full: '100%',
                    screen: '100vh',
                    min: 'min-content',
                    max: 'max-content',
                    fit: 'fit-content',
                },
                minWidth: {
                    0: '0px',
                    full: '100%',
                    min: 'min-content',
                    max: 'max-content',
                    fit: 'fit-content',
                },
                objectPosition: {
                    bottom: 'bottom',
                    center: 'center',
                    left: 'left',
                    'left-bottom': 'left bottom',
                    'left-top': 'left top',
                    right: 'right',
                    'right-bottom': 'right bottom',
                    'right-top': 'right top',
                    top: 'top',
                },
                opacity: {
                    0: '0',
                    5: '0.05',
                    10: '0.1',
                    20: '0.2',
                    25: '0.25',
                    30: '0.3',
                    40: '0.4',
                    50: '0.5',
                    60: '0.6',
                    70: '0.7',
                    75: '0.75',
                    80: '0.8',
                    90: '0.9',
                    95: '0.95',
                    100: '1',
                },
                order: {
                    first: '-9999',
                    last: '9999',
                    none: '0',
                    1: '1',
                    2: '2',
                    3: '3',
                    4: '4',
                    5: '5',
                    6: '6',
                    7: '7',
                    8: '8',
                    9: '9',
                    10: '10',
                    11: '11',
                    12: '12',
                },
                outlineColor: ({
                    theme
                }) => theme('colors'),
                outlineOffset: {
                    0: '0px',
                    1: '1px',
                    2: '2px',
                    4: '4px',
                    8: '8px',
                },
                outlineWidth: {
                    0: '0px',
                    1: '1px',
                    2: '2px',
                    4: '4px',
                    8: '8px',
                },
                padding: ({
                    theme
                }) => theme('spacing'),
                placeholderColor: ({
                    theme
                }) => theme('colors'),
                placeholderOpacity: ({
                    theme
                }) => theme('opacity'),
                ringColor: ({
                    theme
                }) => ({
                    DEFAULT: theme('colors.blue.500', '#3b82f6'),
                    ...theme('colors'),
                }),
                ringOffsetColor: ({
                    theme
                }) => theme('colors'),
                ringOffsetWidth: {
                    0: '0px',
                    1: '1px',
                    2: '2px',
                    4: '4px',
                    8: '8px',
                },
                ringOpacity: ({
                    theme
                }) => ({
                    DEFAULT: '0.5',
                    ...theme('opacity'),
                }),
                ringWidth: {
                    DEFAULT: '3px',
                    0: '0px',
                    1: '1px',
                    2: '2px',
                    4: '4px',
                    8: '8px',
                },
                rotate: {
                    0: '0deg',
                    1: '1deg',
                    2: '2deg',
                    3: '3deg',
                    6: '6deg',
                    12: '12deg',
                    45: '45deg',
                    90: '90deg',
                    180: '180deg',
                },
                saturate: {
                    0: '0',
                    50: '.5',
                    100: '1',
                    150: '1.5',
                    200: '2',
                },
                scale: {
                    0: '0',
                    50: '.5',
                    75: '.75',
                    90: '.9',
                    95: '.95',
                    100: '1',
                    105: '1.05',
                    110: '1.1',
                    125: '1.25',
                    150: '1.5',
                },
                screens: {
                    sm: '640px',
                    md: '768px',
                    lg: '1024px',
                    xl: '1280px',
                    '2xl': '1536px',
                },
                scrollMargin: ({
                    theme
                }) => ({
                    ...theme('spacing'),
                }),
                scrollPadding: ({
                    theme
                }) => theme('spacing'),
                sepia: {
                    0: '0',
                    DEFAULT: '100%',
                },
                skew: {
                    0: '0deg',
                    1: '1deg',
                    2: '2deg',
                    3: '3deg',
                    6: '6deg',
                    12: '12deg',
                },
                space: ({
                    theme
                }) => ({
                    ...theme('spacing'),
                }),
                spacing: {
                    px: '1px',
                    0: '0px',
                    0.5: '0.125rem',
                    1: '0.25rem',
                    1.5: '0.375rem',
                    2: '0.5rem',
                    2.5: '0.625rem',
                    3: '0.75rem',
                    3.5: '0.875rem',
                    4: '1rem',
                    5: '1.25rem',
                    6: '1.5rem',
                    7: '1.75rem',
                    8: '2rem',
                    9: '2.25rem',
                    10: '2.5rem',
                    11: '2.75rem',
                    12: '3rem',
                    14: '3.5rem',
                    16: '4rem',
                    20: '5rem',
                    24: '6rem',
                    28: '7rem',
                    32: '8rem',
                    36: '9rem',
                    40: '10rem',
                    44: '11rem',
                    48: '12rem',
                    52: '13rem',
                    56: '14rem',
                    60: '15rem',
                    64: '16rem',
                    72: '18rem',
                    80: '20rem',
                    96: '24rem',
                },
                stroke: ({
                    theme
                }) => ({
                    none: 'none',
                    ...theme('colors'),
                }),
                strokeWidth: {
                    0: '0',
                    1: '1',
                    2: '2',
                },
                supports: {},
                data: {},
                textColor: ({
                    theme
                }) => theme('colors'),
                textDecorationColor: ({
                    theme
                }) => theme('colors'),
                textDecorationThickness: {
                    auto: 'auto',
                    'from-font': 'from-font',
                    0: '0px',
                    1: '1px',
                    2: '2px',
                    4: '4px',
                    8: '8px',
                },
                textIndent: ({
                    theme
                }) => ({
                    ...theme('spacing'),
                }),
                textOpacity: ({
                    theme
                }) => theme('opacity'),
                textUnderlineOffset: {
                    auto: 'auto',
                    0: '0px',
                    1: '1px',
                    2: '2px',
                    4: '4px',
                    8: '8px',
                },
                transformOrigin: {
                    center: 'center',
                    top: 'top',
                    'top-right': 'top right',
                    right: 'right',
                    'bottom-right': 'bottom right',
                    bottom: 'bottom',
                    'bottom-left': 'bottom left',
                    left: 'left',
                    'top-left': 'top left',
                },
                transitionDelay: {
                    0: '0s',
                    75: '75ms',
                    100: '100ms',
                    150: '150ms',
                    200: '200ms',
                    300: '300ms',
                    500: '500ms',
                    700: '700ms',
                    1000: '1000ms',
                },
                transitionDuration: {
                    DEFAULT: '150ms',
                    0: '0s',
                    75: '75ms',
                    100: '100ms',
                    150: '150ms',
                    200: '200ms',
                    300: '300ms',
                    500: '500ms',
                    700: '700ms',
                    1000: '1000ms',
                },
                transitionProperty: {
                    none: 'none',
                    all: 'all',
                    DEFAULT: 'color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter',
                    colors: 'color, background-color, border-color, text-decoration-color, fill, stroke',
                    opacity: 'opacity',
                    shadow: 'box-shadow',
                    transform: 'transform',
                },
                transitionTimingFunction: {
                    DEFAULT: 'cubic-bezier(0.4, 0, 0.2, 1)',
                    linear: 'linear',
                    in: 'cubic-bezier(0.4, 0, 1, 1)',
                    out: 'cubic-bezier(0, 0, 0.2, 1)',
                    'in-out': 'cubic-bezier(0.4, 0, 0.2, 1)',
                },
                translate: ({
                    theme
                }) => ({
                    ...theme('spacing'),
                    '1/2': '50%',
                    '1/3': '33.333333%',
                    '2/3': '66.666667%',
                    '1/4': '25%',
                    '2/4': '50%',
                    '3/4': '75%',
                    full: '100%',
                }),
                width: ({
                    theme
                }) => ({
                    auto: 'auto',
                    ...theme('spacing'),
                    '1/2': '50%',
                    '1/3': '33.333333%',
                    '2/3': '66.666667%',
                    '1/4': '25%',
                    '2/4': '50%',
                    '3/4': '75%',
                    '1/5': '20%',
                    '2/5': '40%',
                    '3/5': '60%',
                    '4/5': '80%',
                    '1/6': '16.666667%',
                    '2/6': '33.333333%',
                    '3/6': '50%',
                    '4/6': '66.666667%',
                    '5/6': '83.333333%',
                    '1/12': '8.333333%',
                    '2/12': '16.666667%',
                    '3/12': '25%',
                    '4/12': '33.333333%',
                    '5/12': '41.666667%',
                    '6/12': '50%',
                    '7/12': '58.333333%',
                    '8/12': '66.666667%',
                    '9/12': '75%',
                    '10/12': '83.333333%',
                    '11/12': '91.666667%',
                    full: '100%',
                    screen: '100vw',
                    min: 'min-content',
                    max: 'max-content',
                    fit: 'fit-content',
                }),
                willChange: {
                    auto: 'auto',
                    scroll: 'scroll-position',
                    contents: 'contents',
                    transform: 'transform',
                },
                zIndex: {
                    auto: 'auto',
                    0: '0',
                    10: '10',
                    20: '20',
                    30: '30',
                    40: '40',
                    50: '50',
                },
            },
            plugins: [],
        }


        tailwind.config = {
            mode: 'jit',
            darkMode: 'class',
            content: [
                './vendor/laravel/jetstream/**/*.blade.php',
                './vendor/rappasoft/laravel-livewire-tables/resources/views/tailwind/**/*.blade.php',
                './vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php',
                './storage/framework/views/*.php',
                './resources/views/**/*.blade.php',
                './app/Http/Livewire/UsersTable.php',
            ],

            variants: {
                extend: {
                    backgroundColor: ['disabled'],
                    textColor: ['disabled'],
                }
            },
        }
    </script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <livewire:styles />

    <script src="{{ mix('js/app.js') }}" defer></script>

    <style>
        [x-cloak] {
            display: none;
        }
    </style>
    <livewire:styles />
    @stack('styles')

</head>

<body class="dark:bg-gray-900 dark:text-white">
@include('includes.buttons', ['displayStyle' => 'slide-down'])

    <div class="px-3 py-3 pt-5 pb-6 mx-auto text-center">
        <div
            class="inline-flex items-center pl-4 my-6 border-b border-gray-200 sm:pl-6 xl:pl-8 lg:border-b-0 lg:w-60 xl:w-72">
            <a class="w-10 overflow-hidden md:w-auto" href="/"><span class="sr-only">Tailwind CSS home
                    page</span><svg viewBox="0 0 248 31" class="w-auto h-6">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M25.517 0C18.712 0 14.46 3.382 12.758 10.146c2.552-3.382 5.529-4.65 8.931-3.805 1.941.482 3.329 1.882 4.864 3.432 2.502 2.524 5.398 5.445 11.722 5.445 6.804 0 11.057-3.382 12.758-10.145-2.551 3.382-5.528 4.65-8.93 3.804-1.942-.482-3.33-1.882-4.865-3.431C34.736 2.92 31.841 0 25.517 0zM12.758 15.218C5.954 15.218 1.701 18.6 0 25.364c2.552-3.382 5.529-4.65 8.93-3.805 1.942.482 3.33 1.882 4.865 3.432 2.502 2.524 5.397 5.445 11.722 5.445 6.804 0 11.057-3.381 12.758-10.145-2.552 3.382-5.529 4.65-8.931 3.805-1.941-.483-3.329-1.883-4.864-3.432-2.502-2.524-5.398-5.446-11.722-5.446z"
                        fill="#06B6D4"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M76.546 12.825h-4.453v8.567c0 2.285 1.508 2.249 4.453 2.106v3.463c-5.962.714-8.332-.928-8.332-5.569v-8.567H64.91V9.112h3.304V4.318l3.879-1.143v5.937h4.453v3.713zM93.52 9.112h3.878v17.849h-3.878v-2.57c-1.365 1.891-3.484 3.034-6.285 3.034-4.884 0-8.942-4.105-8.942-9.389 0-5.318 4.058-9.388 8.942-9.388 2.801 0 4.92 1.142 6.285 2.999V9.112zm-5.674 14.636c3.232 0 5.674-2.392 5.674-5.712s-2.442-5.711-5.674-5.711-5.674 2.392-5.674 5.711c0 3.32 2.442 5.712 5.674 5.712zm16.016-17.313c-1.364 0-2.477-1.142-2.477-2.463a2.475 2.475 0 012.477-2.463 2.475 2.475 0 012.478 2.463c0 1.32-1.113 2.463-2.478 2.463zm-1.939 20.526V9.112h3.879v17.849h-3.879zm8.368 0V.9h3.878v26.06h-3.878zm29.053-17.849h4.094l-5.638 17.849h-3.807l-3.735-12.03-3.771 12.03h-3.806l-5.639-17.849h4.094l3.484 12.315 3.771-12.315h3.699l3.734 12.315 3.52-12.315zm8.906-2.677c-1.365 0-2.478-1.142-2.478-2.463a2.475 2.475 0 012.478-2.463 2.475 2.475 0 012.478 2.463c0 1.32-1.113 2.463-2.478 2.463zm-1.939 20.526V9.112h3.878v17.849h-3.878zm17.812-18.313c4.022 0 6.895 2.713 6.895 7.354V26.96h-3.878V16.394c0-2.713-1.58-4.14-4.022-4.14-2.55 0-4.561 1.499-4.561 5.14v9.567h-3.879V9.112h3.879v2.285c1.185-1.856 3.124-2.749 5.566-2.749zm25.282-6.675h3.879V26.96h-3.879v-2.57c-1.364 1.892-3.483 3.034-6.284 3.034-4.884 0-8.942-4.105-8.942-9.389 0-5.318 4.058-9.388 8.942-9.388 2.801 0 4.92 1.142 6.284 2.999V1.973zm-5.674 21.775c3.232 0 5.674-2.392 5.674-5.712s-2.442-5.711-5.674-5.711-5.674 2.392-5.674 5.711c0 3.32 2.442 5.712 5.674 5.712zm22.553 3.677c-5.423 0-9.481-4.105-9.481-9.389 0-5.318 4.058-9.388 9.481-9.388 3.519 0 6.572 1.82 8.008 4.605l-3.34 1.928c-.79-1.678-2.549-2.749-4.704-2.749-3.16 0-5.566 2.392-5.566 5.604 0 3.213 2.406 5.605 5.566 5.605 2.155 0 3.914-1.107 4.776-2.749l3.34 1.892c-1.508 2.82-4.561 4.64-8.08 4.64zm14.472-13.387c0 3.249 9.661 1.285 9.661 7.89 0 3.57-3.125 5.497-7.003 5.497-3.591 0-6.177-1.607-7.326-4.177l3.34-1.927c.574 1.606 2.011 2.57 3.986 2.57 1.724 0 3.052-.571 3.052-2 0-3.176-9.66-1.391-9.66-7.781 0-3.356 2.909-5.462 6.572-5.462 2.945 0 5.387 1.357 6.644 3.713l-3.268 1.82c-.647-1.392-1.904-2.035-3.376-2.035-1.401 0-2.622.607-2.622 1.892zm16.556 0c0 3.249 9.66 1.285 9.66 7.89 0 3.57-3.124 5.497-7.003 5.497-3.591 0-6.176-1.607-7.326-4.177l3.34-1.927c.575 1.606 2.011 2.57 3.986 2.57 1.724 0 3.053-.571 3.053-2 0-3.176-9.66-1.391-9.66-7.781 0-3.356 2.908-5.462 6.572-5.462 2.944 0 5.386 1.357 6.643 3.713l-3.268 1.82c-.646-1.392-1.903-2.035-3.375-2.035-1.401 0-2.622.607-2.622 1.892z"
                        fill="#000"></path>
                </svg></a>
        </div>
        <p class="lead">Tailwind 3 Implementation - <a
                href="https://gist.github.com/rappasoft/948adf542307b8f620d53c7c7e735d3c" class="underline"
                target="_blank">Gist</a></p>
    </div>

    <div class="mb-8 text-center">
        <button x-cloak x-on:click="darkMode = !darkMode;">
            <span x-show="!darkMode"
                class="w-8 h-8 p-2 ml-3 text-gray-700 transition bg-gray-100 rounded-md cursor-pointer hover:bg-gray-200">Dark</span>
            <span x-show="darkMode"
                class="w-8 h-8 p-2 ml-3 text-gray-100 transition bg-gray-700 rounded-md cursor-pointer dark:hover:bg-gray-600">Light</span>
        </button>
    </div>

    <div class="pb-6 mx-auto space-y-10 max-w-7xl">
        <div>
            <livewire:other-component />
        </div>
        <div>
            <livewire:users-table filterLayout="slide-down" myParam="Test" />
        </div>

    </div>

    <livewire:scripts />
    @stack('scripts')

</body>

</html>
