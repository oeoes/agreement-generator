$(document).ready(function () {
    $('#surat').on('click', () => {
        $('#surat').parent().siblings().toggle()
        $('#surat').toggleClass('rotate', 300)
    })
    $('#ph_1').on('click', () => {
        $('#ph_1').parent().siblings().toggle()
        $('#ph_1').toggleClass('rotate', 300)
    })
    $('#wph_1').on('click', () => {
        $('#wph_1').parent().siblings().toggle()
        $('#wph_1').toggleClass('rotate', 300)
    })
    $('#ph_2').on('click', () => {
        $('#ph_2').parent().siblings().toggle()
        $('#ph_2').toggleClass('rotate', 300)
    })
    $('#kompensasi').on('click', () => {
        $('#kompensasi').parent().siblings().toggle()
        $('#kompensasi').toggleClass('rotate', 300)
    })
})