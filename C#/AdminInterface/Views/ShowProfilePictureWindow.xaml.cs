using System.Windows;
using System.Windows.Media.Imaging;

namespace AdminInterface.Views
{
    /// <summary>
    /// Interaction logic for ShowProfilePictureWindow.xaml
    /// </summary>
    public partial class ShowProfilePictureWindow : Window
    {
        public ShowProfilePictureWindow(BitmapImage image)
        {
            InitializeComponent();
            profilePicture.Source = image;
        }
    }
}
