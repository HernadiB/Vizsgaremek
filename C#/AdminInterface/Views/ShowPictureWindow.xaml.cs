using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;

namespace AdminInterface.Views
{
    /// <summary>
    /// Interaction logic for ShowPictureWindow.xaml
    /// </summary>
    public partial class ShowPictureWindow : Window
    {
        public ShowPictureWindow(BitmapImage image, string title)
        {
            InitializeComponent();
            this.Title = title;
            img_picture.Source = image;
        }
    }
}
