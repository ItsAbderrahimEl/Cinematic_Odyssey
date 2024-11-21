export default function profileModal ()
{
    return {
        isModalOpen : false,
        modal : document.getElementById ('profile-modal'),

        open ()
        {
            this.modal.classList.remove ('hidden');
            this.isModalOpen = true;
        },

        close ()
        {
            this.modal.classList.add ('hidden');
            this.isModalOpen = false;
        }
    }
}
