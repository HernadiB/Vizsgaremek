using AdminInterface.Entities.Levels;
using AdminInterface.Entities.Tasks;
using AdminInterface.Entities.Teams;
using AdminInterface.Entities.Users;
using AdminInterface.RestAPI;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;

namespace AdminInterface.Models
{
    public class MainWindowViewModel
    {
        private readonly static RestApiHandler restApiHandler = new RestApiHandler("http://localhost:8881");

        //------------------------------Levels------------------------------

        public static List<LevelEntity> AllLevels()
        {
            LevelAll levelAll = restApiHandler.GetObject<LevelAll>("api/levels");
            return levelAll.data;
        }
        public static async Task PostLevel(string levelName)
        {
            try
            {
                if (levelName == "")
                {
                    throw new Exception("Add meg a rang nevét!");
                }
                LevelPutPost level = new LevelPutPost();
                level.Name = levelName;
                await restApiHandler.PostObject("api/levels", level);
                MessageBox.Show($"{levelName} rang sikeresen felvéve!");
            }
            catch (Exception)
            {
                throw;
            }
        }
        public static async Task PutLevel(string levelNewName, string levelOldName)
        {
            try
            {
                if (levelNewName == "")
                {
                    throw new Exception("Add meg a rang új nevét!");
                }
                if (levelOldName == "")
                {
                    throw new Exception("Válaszd ki a rang régi nevét");
                }
                LevelPutPost level = new LevelPutPost();
                level.Name = levelNewName;
                int id = AllLevels().FirstOrDefault(x => x.Name == levelOldName).ID;
                await restApiHandler.PutObject("api/levels" + id, level);
                MessageBox.Show($"A(z) {levelOldName} rang sikeresen módosítva");
            }
            catch (Exception)
            {
                throw;
            }
        }

        //------------------------------Users------------------------------

        public static List<UserEntity> AllUsers()
        {
            UserAll userAll = restApiHandler.GetObject<UserAll>("api/users");
            return userAll.data;
        }
        public static UserEntity GetUserById(int id)
        {
            try
            {
                UserByID user = restApiHandler.GetObject<UserByID>("api/users/" + id);
                if (user == null)
                {
                    throw new Exception("Nincs ilyen felhasználó ilyen ID-val!");
                }
                return user.data;
            }
            catch (Exception)
            {
                throw;
            }
        }
        public static async Task PutUserLevel(string userName, string levelNewName, string levelOldName)
        {
            try
            {
                if (userName == "")
                {
                    throw new Exception("Valaszd ki a módisítani kiívánt felhasználót!");
                }
                if (levelNewName == "")
                {
                    throw new Exception("Add meg a rang új nevét!");
                }
                if (levelOldName == "")
                {
                    throw new Exception("Válaszd ki a rang régi nevét");
                }
                LevelPutPost level = new LevelPutPost();
                int id = AllUsers().FirstOrDefault(x => x.Level == levelOldName).ID;
                level.Name = levelNewName;
                int level_id = AllLevels().FirstOrDefault(x => x.Name == levelOldName).ID;
                await restApiHandler.PutObject("api/users" + id, level);
                MessageBox.Show($"A(z) {userName} rang sikeresen módosítva");
            }
            catch (Exception)
            {
                throw;
            }
        }

        //------------------------------Tasks------------------------------

        public static List<TaskEntity> AllTasks()
        {
            TaskAll taskAll = restApiHandler.GetObject<TaskAll>("api/tasks");
            return taskAll.data;
        }
        public static TaskEntity GetTaskByID(int id)
        {
            try
            {
                TaskByID task = restApiHandler.GetObject<TaskByID>("api/tasks/" + id);
                if (task == null)
                {
                    throw new Exception("Nincs ilyen feladat ilyen ID-val!");
                }
                return task.data;
            }
            catch (Exception)
            {
                throw;
            }
        }

        public static void TaskWindowShow()
        {
            TaskWindow taskWindow = new TaskWindow();
            taskWindow.ShowDialog();
        }

        //------------------------------Teams------------------------------

        public static List<TeamEntity> AllTeams()
        {
            TeamAll teamAll = restApiHandler.GetObject<TeamAll>("api/teams");
            return teamAll.data;
        }
        public static async Task PutTeam(string teamNewName, string teamOldName)
        {
            try
            {
                if (teamNewName == "")
                {
                    throw new Exception("Add meg a csapat új nevét!");
                }
                if (teamOldName == "")
                {
                    throw new Exception("Válaszd ki a csapat régi nevét");
                }
                TeamPostPut team = new TeamPostPut();
                team.Name = teamNewName;
                int id = AllLevels().FirstOrDefault(x => x.Name == teamOldName).ID;
                await restApiHandler.PutObject("api/levels" + id, team);
                MessageBox.Show($"A(z) {teamOldName} csapat sikeresen módosítva");
            }
            catch (Exception)
            {
                throw;
            }
        }
    }
}
