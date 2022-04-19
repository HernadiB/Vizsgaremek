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
using System.Windows.Navigation;
using System.Windows.Shapes;

namespace AdminInterface
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        public MainWindow()
        {
            InitializeComponent();
        }

        private void btn_taskmegjelenit_Click(object sender, RoutedEventArgs e)
        {
            dataGridTasks.Visibility = Visibility.Visible;
            dataGridUsers.Visibility = Visibility.Hidden;
            dataGridRangok.Visibility = Visibility.Hidden;
            dataGridTeams.Visibility = Visibility.Hidden;
        }

        private void btn_rangmegjelenit_Click(object sender, RoutedEventArgs e)
        {
            dataGridTasks.Visibility = Visibility.Hidden;
            dataGridUsers.Visibility = Visibility.Hidden;
            dataGridRangok.Visibility = Visibility.Visible;
            dataGridTeams.Visibility = Visibility.Hidden;
        }

        private void btn_ranghozzaad_Click(object sender, RoutedEventArgs e)
        {

        }

        private void btn_rangmodosit_Click(object sender, RoutedEventArgs e)
        {

        }

        private void btn_felhasznalomegjelenit_Click(object sender, RoutedEventArgs e)
        {
            dataGridTasks.Visibility = Visibility.Hidden;
            dataGridUsers.Visibility = Visibility.Visible;
            dataGridRangok.Visibility = Visibility.Hidden;
            dataGridTeams.Visibility = Visibility.Hidden;
        }


        private void btn_felhasznalorangmodosit_Click(object sender, RoutedEventArgs e)
        {

        }

        private void cb_rangregi_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {

        }

        private void cb_felhasznalonev_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {

        }

        private void btn_taskkezeles_Click(object sender, RoutedEventArgs e)
        {
            TaskWindow feladatkezeles = new TaskWindow();
            feladatkezeles.ShowDialog();
        }

        private void btn_taskmegjelenitid_Click(object sender, RoutedEventArgs e)
        {

        }

        private void btncsapatnevmodosit_Click(object sender, RoutedEventArgs e)
        {

        }

        private void cb_csapatnev_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {

        }

        private void btn_csapatmegjelenit_Click(object sender, RoutedEventArgs e)
        {
            dataGridTasks.Visibility = Visibility.Hidden;
            dataGridUsers.Visibility = Visibility.Hidden;
            dataGridRangok.Visibility = Visibility.Hidden;
            dataGridTeams.Visibility = Visibility.Visible;
        }

        private void ProfilPictureShow_Click(object sender, RoutedEventArgs e)
        {

        }
    }
}
