"use client";

import { Card, ProgressBar, Dropdown } from "react-bootstrap";
import Image from "next/image";

const teamMembersData = [
  {
    image: "/images/user-6.jpg",
    name: "Alex Davis",
    designation: "Head of HR",
    tasks: "55",
    progress: "50",
    progressBg: "primary",
  },
  {
    image: "/images/user-7.jpg",
    name: "Laura Martinez",
    designation: "laura@trezo.com",
    tasks: "125",
    progress: "80",
    progressBg: "success",
  },
  {
    image: "/images/user-8.jpg",
    name: "Mark Thompson",
    designation: "mark@trezo.com",
    tasks: 78,
    progress: "70",
    progressBg: "info",
  },
  {
    image: "/images/user-9.jpg",
    name: "Rachel White",
    designation: "rachel@trezo.com",
    tasks: 95,
    progress: "40",
    progressBg: "danger",
  },
  {
    image: "/images/user-10.jpg",
    name: "Kevin Lee",
    designation: "kevin@trezo.com",
    tasks: 134,
    progress: "80",
    progressBg: "warning",
  },
];

const TeamMembers = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-0 pb-4">
          <div className="p-4">
            <div className="d-flex justify-content-between align-items-center flex-wrap gap-3">
              <h3 className="mb-0">Team Members</h3>

              <Dropdown className="action-opt">
                <Dropdown.Toggle
                  variant="secondary"
                  id="dropdown-basic"
                  className="bg-transparent p-0"
                >
                  <span className="material-symbols-outlined">more_horiz</span>
                </Dropdown.Toggle>

                <Dropdown.Menu className="bg-white border box-shadow">
                  <Dropdown.Item href="#">
                    <span className="material-symbols-outlined">schedule</span>
                    Today
                  </Dropdown.Item>

                  <Dropdown.Item href="#">
                    <span className="material-symbols-outlined">pie_chart</span>
                    Last 7 Days
                  </Dropdown.Item>

                  <Dropdown.Item href="#">
                    <i className="material-symbols-outlined">refresh</i>
                    Last Month
                  </Dropdown.Item>

                  <Dropdown.Item href="#">
                    <span className="material-symbols-outlined">
                      calendar_today
                    </span>
                    Last 1 Year
                  </Dropdown.Item>

                  <Dropdown.Item href="#">
                    <span className="material-symbols-outlined">bar_chart</span>
                    All Time
                  </Dropdown.Item>

                  <Dropdown.Item href="#">
                    <i className="material-symbols-outlined">visibility</i>
                    View
                  </Dropdown.Item>

                  <Dropdown.Item href="#">
                    <i className="material-symbols-outlined">delete</i>
                    Delete
                  </Dropdown.Item>
                </Dropdown.Menu>
              </Dropdown>
            </div>
          </div>

          <div className="default-table-area style-two team-members">
            <div className="table-responsive">
              <table className="table align-middle border-0">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Tasks</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  {teamMembersData &&
                    teamMembersData.slice(0, 5).map((value, i) => (
                      <tr key={i}>
                        <td className="border-0 py-3 pb-0">
                          <div className="d-flex align-items-center">
                            <div className="flex-shrink-0">
                              <Image
                                src={value.image}
                                className="wh-44 rounded-circle"
                                alt="user"
                                width={44}
                                height={44}
                              />
                            </div>
                            <div className="flex-grow-1 ms-2 position-relative top-2">
                              <h6 className="mb-0 fs-14 fw-medium">
                                {value.name}
                              </h6>
                              <span className="fs-12">{value.designation}</span>
                            </div>
                          </div>
                        </td>

                        <td className="border-0 py-3 pb-0">{value.tasks}</td>

                        <td className="border-0 py-3 pb-0">
                          <ProgressBar
                            variant={value.progressBg}
                            now={value.progress}
                            style={{
                              height: "5px",
                            }}
                          />
                        </td>
                      </tr>
                    ))}
                </tbody>
              </table>
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default TeamMembers;
