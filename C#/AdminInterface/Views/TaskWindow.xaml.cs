﻿using AdminInterface.Algorithms;
using AdminInterface.Entities.Levels;
using AdminInterface.Entities.Tasks;
using AdminInterface.Models;
using Ookii.Dialogs.Wpf;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Windows;
using System.Windows.Controls;

namespace AdminInterface
{
    /// <summary>
    /// Interaction logic for TaskWindow.xaml
    /// </summary>
    public partial class TaskWindow : Window
    {
        public TaskWindow()
        {
            InitializeComponent();
            DataSources();
        }

        public void DataSources()
        {
            cb_postTaskLevel.ItemsSource = Levels.Select(x => x.Name);
            cb_putTaskID.ItemsSource = Tasks.Select(x => x.ID);
            cb_putTaskLevel.ItemsSource = Levels.Select(x => x.Name);
        }

        private readonly List<LevelEntity> Levels = TaskWindowViewModel.AllLevels();
        private readonly List<TaskEntity> Tasks = TaskWindowViewModel.AllTasks();


        //------------------------------PostTask------------------------------

        private async void btn_postTask_Click(object sender, RoutedEventArgs e)
        {
            TaskPutPost task = new TaskPutPost();
            try
            {
                if (cb_postTaskLevel.Text == "")
                {
                    throw new Exception("Válassz ki egy feladat szintet!");
                }
                if (int.Parse(tb_postTaskScore.Text) < 1)
                {
                    throw new Exception("A pontszám csak 0 fölötti érték lehet!");
                }
                string name = tb_postTaskName.Text;
                string description = tb_postTaskDescription.Text;
                int score = int.Parse(tb_postTaskScore.Text);
                int level_id = Levels.FirstOrDefault(x => x.Name == cb_postTaskLevel.Text).ID;
                var filepath = btn_postTaskImage.DataContext;
                string base64 = Base64.Encode(filepath as string);
                if (name == "" || description == "")
                {
                    throw new Exception("Add meg a feladat minden tulajdonságát!");
                }
                task = new TaskPutPost(name, description, score, level_id, base64);
            }
            catch (ArgumentNullException)
            {
                MessageBox.Show("A kép feltöltése kötelező!");
                return;
            }
            catch (FormatException)
            {
                MessageBox.Show("A beírt számok nem megfelelőek!");
                return;
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
                return;
            }
            await TaskWindowViewModel.PostTask(task);
            MessageBox.Show("A feladat sikeresen eltárolva!");
        }
        private void btn_postTaskImage_Click(object sender, RoutedEventArgs e)
        {
            var dialog = new VistaOpenFileDialog();
            bool? success = dialog.ShowDialog();
            (sender as Button).DataContext = dialog.FileName;
        }


        //------------------------------PutTask------------------------------
        private async void btn_putTask_Click(object sender, RoutedEventArgs e)
        {
            int id = 0;
            TaskPutPost task;
            try
            {
                id = int.Parse(cb_putTaskID.Text);
                if (cb_putTaskLevel.Text == "")
                {
                    throw new Exception("Válassz ki egy feladat szintet!");
                }
                if (int.Parse(tb_putTaskScore.Text) < 1)
                {
                    throw new Exception("A pontszám csak 0 fölötti érték lehet!");
                }
                string name = tb_putTaskName.Text;
                string description = tb_putTaskDescription.Text;
                int score = int.Parse(tb_putTaskScore.Text);
                int level_id = Levels.FirstOrDefault(x => x.Name == cb_putTaskLevel.Text).ID;
                var filepath = btn_putTaskImage.DataContext;
                string base64 = "unmodified";
                if (filepath is not null and not "")
                {
                    base64 = Base64.Encode(filepath as string);
                }
                if (name == "" || description == "")
                {
                    throw new Exception("Add meg a feladat minden tulajdonságát!");
                }
                task = new TaskPutPost(name, description, score, level_id, base64);
            }
            catch (ArgumentNullException)
            {
                MessageBox.Show("A kép feltöltése kötelező!");
                return;
            }
            catch (FormatException)
            {
                MessageBox.Show("A beírt számok nem megfelelőek!");
                return;
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
                return;
            }
            await TaskWindowViewModel.PutTask(task, id);
            MessageBox.Show("A feladat sikeresen módosítva!");
        }



        private void btn_putTaskImage_Click(object sender, RoutedEventArgs e)
        {
            var dialog = new VistaOpenFileDialog();
            bool? success = dialog.ShowDialog();
            (sender as Button).DataContext = dialog.FileName;
        }

        private void cb_putTaskID_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            int id = int.Parse((sender as ComboBox).SelectedItem.ToString());
            TaskEntity task = Tasks.FirstOrDefault(x => x.ID == id);
            tb_putTaskName.Text = task.Name;
            tb_putTaskDescription.Text = task.Description;
            tb_putTaskScore.Text = task.Score.ToString();
            cb_putTaskLevel.SelectedItem = task.Level;
        }
    }
}
