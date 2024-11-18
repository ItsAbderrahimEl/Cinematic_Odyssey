/** @type {import('tailwindcss').Config} */
export default {
    content : [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue"
    ],
    theme : {
        extend : {
            spacing : {
                'custom' : '5rem',
                'large_md' : '60rem'
            },
            boxShadow : {
                '3xl' : '0 35px 60px -15px rgba(0, 0, 0, 0.3)'
            },
            colors : {}
        }
    },
    plugins : []
}

