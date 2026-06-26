/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],
    theme: {
        extend: {
            colors: {
                primary:  '#6EC1E4',
                accent:   '#61CE70',
                dark:     '#181818',
                darker:   '#0D0D0D',
                card:     '#1A1A1A',
                mid:      '#9F9F9F',
                muted:    '#BCBCBC',
            },
            fontFamily: {
                sans: ['-apple-system','BlinkMacSystemFont','"Segoe UI"','system-ui','sans-serif'],
                slab: ['Georgia','"Times New Roman"','serif'],
            },
            keyframes: {
                pulse2: {
                    '0%,100%': {transform:'scale(1)',opacity:'1'},
                    '50%':     {transform:'scale(1.5)',opacity:'0.6'},
                },
                morph: {
                    '0%,100%': {borderRadius:'60% 40% 70% 30% / 50% 60% 40% 50%'},
                    '33%':     {borderRadius:'40% 60% 30% 70% / 60% 40% 60% 40%'},
                    '66%':     {borderRadius:'70% 30% 50% 50% / 40% 70% 30% 60%'},
                },
                waPulse: {
                    '0%':   {transform:'scale(1)',opacity:'0.7'},
                    '100%': {transform:'scale(2.4)',opacity:'0'},
                },
            },
            animation: {
                'pulse2':   'pulse2 2s infinite',
                'morph':    'morph 8s ease-in-out infinite',
                'wa-pulse': 'waPulse 2s ease-out infinite',
            },
        },
    },
    plugins: [],
}