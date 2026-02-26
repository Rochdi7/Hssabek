"use client";

import { Card } from "react-bootstrap";

const Timeline = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="position-relative timeline-item">
            <span className="time-line-date">Just now</span>

            <div className="border-style-for-timeline">
              <h4 className="fs-14 fw-medium mb-2">Weekly Stand-Up Meetings:</h4>
              <p className="fs-13">
                We continued our weekly stand-up meetings where team members
                provided updates on their current tasks, discussed any
                roadblocks, and coordinated efforts for the week ahead.
              </p>
              <p>
                By: <span className="text-primary">Olivia Rodriguez</span>
              </p>
            </div>
          </div>

          <div className="position-relative timeline-item">
            <span className="time-line-date">1 day ago</span>

            <div className="border-style-for-timeline dot-2">
              <h4 className="fs-14 fw-medium mb-2">Project Kickoff Session:</h4>
              <p className="fs-13">
                The session included introductions, a review of project goals
                and objectives, and initial planning discussions.
              </p>
              <p>
                By: <span className="text-primary">Isabella Cooper</span>
              </p>
            </div>
          </div>

          <div className="position-relative timeline-item">
            <span className="time-line-date">2 days ago</span>

            <div className="border-style-for-timeline dot-3">
              <h4 className="fs-14 fw-medium mb-2">Team Building Workshop:</h4>
              <p className="fs-13">
                Last Friday, we conducted a team building workshop focused on
                improving communication and collaboration among team members.
                Activities included team challenges, icebreakers, and open
                discussions.
              </p>
              <p>
                By: <span className="text-primary">Lucas Morgan</span>
              </p>
            </div>
          </div>
          
          <div className="position-relative timeline-item">
            <span className="time-line-date">3 days ago</span>

            <div className="border-style-for-timeline dot-4 pb-0">
              <h4 className="fs-14 fw-medium mb-2">Lunch and Learn Session:</h4>
              <p className="fs-13">
                We organized a lunch and learn session on March 15th where a
                guest speaker from the industry discussed emerging trends in our
                field. It was an insightful session that sparked valuable
                discussions among team members.
              </p>
              <p>
                By: <span className="text-primary">Ethan Parker</span>
              </p>
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default Timeline;
