using AdminInterface.Algorithms;
using AdminInterface.Entities.Levels;
using AdminInterface.Entities.Tasks;
using AdminInterface.Entities.Teams;
using AdminInterface.Entities.Users;
using AdminInterface.Models;
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
            cb_oldTeamName.SelectedIndex = 0;
            cb_oldLevelName.SelectedIndex = 0;
        }

        public void DataSources()
        {
            cb_oldLevelName.ItemsSource = Levels.Select(x => x.Name);
            cb_oldTeamName.ItemsSource = Teams.Select(x => x.Name);
        }

        private readonly List<LevelEntity> Levels = MainWindowViewModel.AllLevels();
        private readonly List<TaskEntity> Tasks = MainWindowViewModel.AllTasks();
        private readonly List<TeamEntity> Teams = MainWindowViewModel.AllTeams();
        private readonly List<UserEntity> Users = MainWindowViewModel.AllUsers();


        //------------------------------Levels------------------------------

        private void btn_levelDisplay_Click(object sender, RoutedEventArgs e)
        {
            dataGridTasks.Visibility = Visibility.Hidden;
            dataGridUsers.Visibility = Visibility.Hidden;
            dataGridTeams.Visibility = Visibility.Hidden;
            dataGridLevels.Visibility = Visibility.Visible;
            dataGridLevels.ItemsSource = Levels;
        }
        private void btn_postLevel_Click(object sender, RoutedEventArgs e)
        {
            TryCatch(async () => await MainWindowViewModel.PostLevel(tb_postLevel.Text));
        }
        private void cb_oldLevelName_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            string oldLevelName = (sender as ComboBox).SelectedItem.ToString();
            tb_newLevelName.Text = Levels.Where(x => x.Name == oldLevelName).FirstOrDefault().Name;
        }
        private void btn_putLevel_Click(object sender, RoutedEventArgs e)
        {
            TryCatch(async () => await MainWindowViewModel.PutLevel(tb_newLevelName.Text, cb_oldLevelName.Text));
        }


        //------------------------------Users------------------------------

        private void btn_userDisplay_Click(object sender, RoutedEventArgs e)
        {
            dataGridTasks.Visibility = Visibility.Hidden;
            dataGridLevels.Visibility = Visibility.Hidden;
            dataGridTeams.Visibility = Visibility.Hidden;
            dataGridUsers.Visibility = Visibility.Visible;
            dataGridUsers.ItemsSource = Users;
        }
        private void btn_userDisplayByID_Click(object sender, RoutedEventArgs e)
        {
            UserEntity user = new UserEntity();
            try
            {
                user = MainWindowViewModel.GetUserById(int.Parse(tb_userDisplayByID.Text));
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
                return;
            }
            ObservableCollection<UserEntity> collection = new ObservableCollection<UserEntity>() { user };
            dataGridLevels.Visibility = Visibility.Hidden;
            dataGridTasks.Visibility = Visibility.Hidden;
            dataGridTeams.Visibility = Visibility.Hidden;
            dataGridUsers.Visibility = Visibility.Visible;
            dataGridUsers.ItemsSource = collection;
        }

        private void ProfilePictureShow_Click(object sender, RoutedEventArgs e)
        {
            string base64 = (sender as Button).DataContext as string;
            BitmapImage bitmapImage = Base64.Decode(base64);
            ShowPictureWindow window = new ShowPictureWindow(bitmapImage);
            window.ShowDialog();
        }


        //------------------------------Tasks------------------------------

        private void btn_taskDisplay_Click(object sender, RoutedEventArgs e)
        {
            dataGridUsers.Visibility = Visibility.Hidden;
            dataGridLevels.Visibility = Visibility.Hidden;
            dataGridTeams.Visibility = Visibility.Hidden;
            dataGridTasks.Visibility = Visibility.Visible;
            dataGridTasks.ItemsSource = Tasks;
        }
        private void btn_taskDisplayByID_Click(object sender, RoutedEventArgs e)
        {
            TaskEntity task = new TaskEntity();
            try
            {
                task = MainWindowViewModel.GetTaskByID(int.Parse(tb_taskDisplayByID.Text));
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
                return;
            }
            ObservableCollection<TaskEntity> collection = new ObservableCollection<TaskEntity>() { task };
            dataGridLevels.Visibility = Visibility.Hidden;
            dataGridTeams.Visibility = Visibility.Hidden;
            dataGridUsers.Visibility = Visibility.Hidden;
            dataGridTasks.Visibility = Visibility.Visible;
            dataGridTasks.ItemsSource = collection;
        }

        private void TaskPictureShow_Click(object sender, RoutedEventArgs e)
        {
            string base64 = (sender as Button).DataContext as string;
            BitmapImage bitmapImage = Base64.Decode(base64);
            ShowPictureWindow window = new ShowPictureWindow(bitmapImage);
            window.ShowDialog();
        }

        private void btn_taskManage_Click(object sender, RoutedEventArgs e)
        {
            TaskWindow taskManage = new TaskWindow();
            taskManage.ShowDialog();
        }


        //------------------------------Teams------------------------------

        private void btn_teamDisplay_Click(object sender, RoutedEventArgs e)
        {
            dataGridTasks.Visibility = Visibility.Hidden;
            dataGridUsers.Visibility = Visibility.Hidden;
            dataGridLevels.Visibility = Visibility.Hidden;
            dataGridTeams.Visibility = Visibility.Visible;
            dataGridTeams.ItemsSource = Teams;
        }

        private void btn_teamDisplayByID_Click(object sender, RoutedEventArgs e)
        {
            TeamEntity team = new TeamEntity();
            try
            {
                team = MainWindowViewModel.GetTeamByID(int.Parse(tb_teamDisplayByID.Text));
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
                return;
            }
            ObservableCollection<TeamEntity> collection = new ObservableCollection<TeamEntity>() { team };
            dataGridLevels.Visibility = Visibility.Hidden;
            dataGridUsers.Visibility = Visibility.Hidden;
            dataGridTasks.Visibility = Visibility.Hidden;
            dataGridTeams.Visibility = Visibility.Visible;
            dataGridTeams.ItemsSource = collection;
        }
        private void cb_oldTeamName_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            string oldTeamName = (sender as ComboBox).SelectedItem.ToString();
            tb_newTeamName.Text = Teams.Where(x => x.Name == oldTeamName).FirstOrDefault().Name;
        }
        private void btn_putTeamName_Click(object sender, RoutedEventArgs e)
        {
            TryCatch(async () => await MainWindowViewModel.PutTeam(tb_newTeamName.Text, cb_oldTeamName.Text));
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
