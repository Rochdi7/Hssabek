"use client";

import { Card, Form, Table } from "react-bootstrap";
import Link from "next/link";
import Image from "next/image";

const projectsData = [
  {
    id: "#854",
    projectName: "Project CyberSphere",
    viewLink: "/project-management/project-overview/",
    client: "NovaTech Solutions",
    assignees: {
      images: [
        {
          img: "/images/user-15.jpg",
        },
        {
          img: "/images/user-11.jpg",
        },
        {
          img: "/images/user-6.jpg",
        },
        {
          img: "/images/user-9.jpg",
        },
      ],
      number: "+10",
    },
    budget: "$4,500",
    startDate: "25 Mar 2024",
    endDate: "25 Apr 2024",
    status: "finished",
  },
  {
    id: "#853",
    projectName: "Digital Oasis Initiative",
    viewLink: "/project-management/project-overview/",
    client: "AlphaWave Innovations",
    assignees: {
      images: [
        {
          img: "/images/user-7.jpg",
        },
        {
          img: "/images/user-8.jpg",
        },
        {
          img: "/images/user-9.jpg",
        },
      ],
      number: "+04",
    },
    budget: "$6,800",
    startDate: "20 Mar 2024",
    endDate: "20 Apr 2024",
    status: "inProgress",
  },
  {
    id: "#852",
    projectName: "CloudScape Evolution",
    viewLink: "/project-management/project-overview/",
    client: "InnovateIQ Inc.",
    assignees: {
      images: [
        {
          img: "/images/user-10.jpg",
        },
        {
          img: "/images/user-12.jpg",
        },
      ],
      number: "+07",
    },
    budget: "$2,500",
    startDate: "15 Mar 2024",
    endDate: "15 Apr 2024",
    status: "pending",
  },
  {
    id: "#851",
    projectName: "Data Dynamo Drive",
    viewLink: "/project-management/project-overview/",
    client: "BlueSky Technologies",
    assignees: {
      images: [
        {
          img: "/images/user-13.jpg",
        },
        {
          img: "/images/user-14.jpg",
        },
        {
          img: "/images/user-15.jpg",
        },
        {
          img: "/images/user-12.jpg",
        },
      ],
      number: "+15",
    },
    budget: "$7,500",
    startDate: "10 Mar 2024",
    endDate: "10 Apr 2024",
    status: "inProgress",
  },
  {
    id: "#849",
    projectName: "QuantumLeap Quest",
    viewLink: "/project-management/project-overview/",
    client: "NexGen Systems",
    assignees: {
      images: [
        {
          img: "/images/user-7.jpg",
        },
        {
          img: "/images/user-9.jpg",
        },
        {
          img: "/images/user-6.jpg",
        },
      ],
      number: "+03",
    },
    budget: "$3,400",
    startDate: "05 Mar 2024",
    endDate: "05 Apr 2024",
    status: "finished",
  },
  {
    id: "#849",
    projectName: "QuantumLeap Quest",
    viewLink: "/project-management/project-overview/",
    client: "NexGen Systems",
    assignees: {
      images: [
        {
          img: "/images/user-7.jpg",
        },
        {
          img: "/images/user-9.jpg",
        },
        {
          img: "/images/user-6.jpg",
        },
      ],
      number: "+03",
    },
    budget: "$3,400",
    startDate: "05 Mar 2024",
    endDate: "05 Apr 2024",
    status: "finished",
  },
  {
    id: "#851",
    projectName: "Data Dynamo Drive",
    viewLink: "/project-management/project-overview/",
    client: "BlueSky Technologies",
    assignees: {
      images: [
        {
          img: "/images/user-13.jpg",
        },
        {
          img: "/images/user-14.jpg",
        },
        {
          img: "/images/user-15.jpg",
        },
        {
          img: "/images/user-12.jpg",
        },
      ],
      number: "+15",
    },
    budget: "$7,500",
    startDate: "10 Mar 2024",
    endDate: "10 Apr 2024",
    status: "inProgress",
  },
];

const AllProjects = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-0">
          <div className="p-4">
            <div className="d-flex justify-content-between align-items-center flex-wrap gap-3">
              <h3 className="mb-0">All Projects</h3>

              <Form.Select
                className="month-select form-control p-0 h-auto border-0"
                aria-label="Default select example"
              >
                <option defaultValue="0">This Week</option>
                <option defaultValue="1">This Month</option>
                <option defaultValue="2">This Year</option>
              </Form.Select>
            </div>
          </div>

          <div className="default-table-area style-two all-projects">
            <div className="table-responsive">
              <Table className="align-middle">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Project Name</th>
                    <th scope="col">Client</th>
                    <th scope="col">Assignees</th>
                    <th scope="col">Budget</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  {projectsData &&
                    projectsData.slice(0, 5).map((value, i) => (
                      <tr key={i}>
                        <td className="text-body">{value.id}</td>

                        <td>
                          <Link href={value.viewLink}>{value.projectName}</Link>
                        </td>

                        <td>{value.client}</td>

                        <td>
                          <ul className="ps-0 mb-0 list-unstyled d-flex align-items-center">
                            {value.assignees.images
                              .slice(0, 5)
                              .map((value, i) => (
                                <li key={i} className="ms-m-10">
                                  <Image
                                    src={value.img}
                                    className="wh-34 lh-34 rounded-circle border border-1 border-color-white"
                                    alt="user"
                                    width={34}
                                    height={34}
                                  />
                                </li>
                              ))}

                            <li className="ms-m-10">
                              <div className="wh-34 lh-34 rounded-circle bg-primary d-block text-center text-decoration-none text-white fs-12 fw-medium border border-1 border-color-white">
                                {value.assignees.number}
                              </div>
                            </li>
                          </ul>
                        </td>

                        <td className="text-body">{value.budget}</td>

                        <td className="text-body">{value.startDate}</td>

                        <td className="text-body">{value.endDate}</td>

                        <td>
                          <span
                            className={`badge bg-opacity-10 p-2 fs-12 fw-normal text-capitalize ${value.status}`}
                          >
                            {value.status}
                          </span>
                        </td>

                        <td>
                          <div className="d-flex align-items-center gap-1">
                            <Link href={value.viewLink}>
                              <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                                <span className="material-symbols-outlined fs-16 text-primary">
                                  visibility
                                </span>
                              </button>
                            </Link>

                            <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                              <span className="material-symbols-outlined fs-16 text-body">
                                edit
                              </span>
                            </button>

                            <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                              <span className="material-symbols-outlined fs-16 text-danger">
                                delete
                              </span>
                            </button>
                          </div>
                        </td>
                      </tr>
                    ))}
                </tbody>
              </Table>
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default AllProjects;
