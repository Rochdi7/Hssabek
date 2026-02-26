"use client";

import { Card } from "react-bootstrap";

const activities = [
  {
    time: "Just now",
    title: "Weekly Stand-Up Meetings",
    description:
      "Team members provided updates on their current tasks, discussed roadblocks, and coordinated efforts for the week ahead.",
    author: "Olivia Rodriguez",
  },
  {
    time: "1 day ago",
    title: "Project Kickoff Session",
    description:
      "Introductions, a review of project goals and objectives, and initial planning discussions.",
    author: "Isabella Cooper",
  },
  {
    time: "2 days ago",
    title: "Team Building Workshop",
    description:
      "Focused on improving communication and collaboration among team members through challenges, icebreakers, and discussions.",
    author: "Lucas Morgan",
  },
  {
    time: "3 days ago",
    title: "Lunch and Learn Session",
    description:
      "A guest speaker discussed emerging trends in our field, sparking valuable discussions among team members.",
    author: "Ethan Parker",
  },
  // Add more activities as needed
];

const RecentActivity = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex align-items-center justify-content-between mb-3">
            <h3 className="mb-3 mb-lg-4">Recent Activity</h3>
          </div>

          {activities.map((activity, index) => (
            <div key={index} className="position-relative timeline-item">
              <span className="time-line-date">{activity.time}</span>
              <div className={`border-style-for-timeline dot-${index + 1}`}>
                <h4 className="fs-14 fw-medium mb-2">{activity.title}:</h4>
                <p className="fs-13">{activity.description}</p>
                <p>
                  By: <span className="text-primary">{activity.author}</span>
                </p>
              </div>
            </div>
          ))}
        </Card.Body>
      </Card>
    </>
  );
};

export default RecentActivity;
