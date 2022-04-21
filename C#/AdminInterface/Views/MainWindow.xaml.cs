using AdminInterface.Algorithms;
using AdminInterface.Entities.Levels;
using AdminInterface.Entities.Tasks;
using AdminInterface.Entities.Teams;
using AdminInterface.Entities.Users;
using AdminInterface.Models;
using Ookii.Dialogs.Wpf;
using AdminInterface.Views;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Linq;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Media.Imaging;

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
            DataSources();
            cb_regicsapatnev.SelectedIndex = 0;
            cb_szintregi.SelectedIndex = 0;
        }

        public void DataSources()
        {
            cb_szintregi.ItemsSource = Levels.Select(x => x.Name);
            cb_regicsapatnev.ItemsSource = Teams.Select(x => x.Name);
        }

        private readonly List<LevelEntity> Levels = MainWindowViewModel.AllLevels();
        private readonly List<TaskEntity> Tasks = MainWindowViewModel.AllTasks();
        private readonly List<TeamEntity> Teams = MainWindowViewModel.AllTeams();
        private readonly List<UserEntity> Users = MainWindowViewModel.AllUsers();


        //------------------------------Levels------------------------------

        private void btn_rangmegjelenit_Click(object sender, RoutedEventArgs e)
        {
            dataGridTasks.Visibility = Visibility.Hidden;
            dataGridUsers.Visibility = Visibility.Hidden;
            dataGridRangok.Visibility = Visibility.Visible;
            dataGridTeams.Visibility = Visibility.Hidden;
            dataGridRangok.ItemsSource = Levels;
        }
        private void btn_ranghozzaad_Click(object sender, RoutedEventArgs e)
        {
            TryCatch(async () => await MainWindowViewModel.PostLevel(tb_Rang.Text));
        }
        private void cb_rangregi_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            string str = (sender as ComboBox).SelectedItem.ToString();
            tb_ranguj.Text = Levels.Where(x => x.Name == str).FirstOrDefault().Name;
        }
        private void btn_rangmodosit_Click(object sender, RoutedEventArgs e)
        {
            TryCatch(async () => await MainWindowViewModel.PutLevel(tb_ranguj.Text, cb_szintregi.Text));
        }


        //------------------------------Users------------------------------

        private void btn_felhasznalomegjelenit_Click(object sender, RoutedEventArgs e)
        {
            dataGridTasks.Visibility = Visibility.Hidden;
            dataGridUsers.Visibility = Visibility.Visible;
            dataGridRangok.Visibility = Visibility.Hidden;
            dataGridTeams.Visibility = Visibility.Hidden;
            dataGridUsers.ItemsSource = Users;
        }
        private void btn_usermegjelenitid_Click(object sender, RoutedEventArgs e)
        {
            UserEntity user = new UserEntity();
            try
            {
                user = MainWindowViewModel.GetUserById(int.Parse(tb_felhasznalomegjelenit.Text));
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
                return;
            }
            ObservableCollection<UserEntity> collection = new ObservableCollection<UserEntity>() { user };
            dataGridRangok.Visibility = Visibility.Hidden;
            dataGridTasks.Visibility = Visibility.Hidden;
            dataGridTeams.Visibility = Visibility.Hidden;
            dataGridUsers.Visibility = Visibility.Visible;
            dataGridUsers.ItemsSource = collection;
        }
        private void ProfilPictureShow_Click(object sender, RoutedEventArgs e)
        {
            string base64 = (sender as Button).DataContext as string;
            BitmapImage bitmapImage = Base64.Decode(base64);
            ShowProfilePictureWindow window = new ShowProfilePictureWindow(bitmapImage);
            window.ShowDialog();
        }


        //------------------------------Tasks------------------------------

        private void btn_taskmegjelenit_Click(object sender, RoutedEventArgs e)
        {
            dataGridTasks.Visibility = Visibility.Visible;
            dataGridUsers.Visibility = Visibility.Hidden;
            dataGridRangok.Visibility = Visibility.Hidden;
            dataGridTeams.Visibility = Visibility.Hidden;
            dataGridTasks.ItemsSource = Tasks;
        }
        private void btn_taskmegjelenitid_Click(object sender, RoutedEventArgs e)
        {
            TaskEntity task = new TaskEntity();
            try
            {
                task = MainWindowViewModel.GetTaskByID(int.Parse(tb_taskmegjelenit.Text));
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
                return;
            }
            ObservableCollection<TaskEntity> collection = new ObservableCollection<TaskEntity>() { task };
            dataGridRangok.Visibility = Visibility.Hidden;
            dataGridTeams.Visibility = Visibility.Hidden;
            dataGridUsers.Visibility = Visibility.Hidden;
            dataGridTasks.Visibility = Visibility.Visible;
            dataGridTasks.ItemsSource = collection;
        }
        private void btn_taskkezeles_Click(object sender, RoutedEventArgs e)
        {
            TaskWindow feladatkezeles = new TaskWindow();
            feladatkezeles.ShowDialog();
        }


        //------------------------------Teams------------------------------

        private void btn_csapatmegjelenit_Click(object sender, RoutedEventArgs e)
        {
            dataGridTasks.Visibility = Visibility.Hidden;
            dataGridUsers.Visibility = Visibility.Hidden;
            dataGridRangok.Visibility = Visibility.Hidden;
            dataGridTeams.Visibility = Visibility.Visible;
            dataGridTeams.ItemsSource = Teams;
        }
        private void cb_regicsapatnev_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            string str = (sender as ComboBox).SelectedItem.ToString();
            tb_csapatujnev.Text = Teams.Where(x => x.Name == str).FirstOrDefault().Name;
        }
        private void btn_csapatnevmodosit_Click(object sender, RoutedEventArgs e)
        {
            TryCatch(async () => await MainWindowViewModel.PutTeam(tb_csapatujnev.Text, cb_regicsapatnev.Text));
        }


        public void TryCatch(Action action)
        {
            try
            {
                action();
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
        }
    }
}
