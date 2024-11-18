export default function menuModal ()
{
    return {
        isModalOpen : false,
        videoIframe : document.getElementById ('videoIframe'),

        open ()
        {
            this.isModalOpen = ! this.isModalOpen
        },
        close ()
        {
            this.isModalOpen = false
            this.videoIframe.src = this.videoIframe.src
        }
    }
}
