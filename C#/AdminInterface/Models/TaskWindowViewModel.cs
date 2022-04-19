using AdminInterface.Entities.Levels;
using AdminInterface.Entities.Tasks;
using AdminInterface.Entities.Teams;
using AdminInterface.RestAPI;
using System.Collections.Generic;
using System.Threading.Tasks;

namespace AdminInterface.Models
{
    public class TaskWindowViewModel
    {
        private readonly static RestApiHandler restApiHandler = new RestApiHandler("http://localhost:8881");
        public static List<LevelEntity> AllLevels()
        {
            LevelAll levelAll = restApiHandler.GetObject<LevelAll>("api/levels");
            return levelAll.data;
        }
        public static List<TaskEntity> AllTasks()
        {
            TaskAll taskAll = restApiHandler.GetObject<TaskAll>("api/tasks");
            return taskAll.data;
        }
        public static List<TeamEntity> AllTeams()
        {
            TeamAll teamAll = restApiHandler.GetObject<TeamAll>("api/teams");
            return teamAll.data;
        }
        public static async Task PostTask(TaskPutPost task)
        {
            await restApiHandler.PostObject("api/tasks", task);
        }
        public static async Task PutTask(TaskPutPost task, int id)
        {
            await restApiHandler.PutObject("api/tasks/" + id, task);
        }
    }
}
