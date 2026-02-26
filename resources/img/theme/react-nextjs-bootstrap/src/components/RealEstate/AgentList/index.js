"use client";

import { Card, Button, Row, Col } from "react-bootstrap";
import Image from "next/image";
import Link from "next/link";
import { useState } from "react";

// Sample agent data (this could come from an API or database)
const agents = [
  {
    id: 1,
    name: "Sarah Johnson",
    email: "sarah@email.com",
    phone: "(123) 456-7890",
    location: "74 Grim Avenue San Diego",
    image: "/images/agent-1.png",
    socialLinks: {
      facebook: "https://www.facebook.com/",
      twitter: "https://www.twitter.com/",
      linkedin: "https://www.linkedin.com/",
    },
  },
  {
    id: 2,
    name: "Pauline Knott",
    email: "pauline@email.com",
    phone: "(987) 654-3210",
    location: "9 Paul Wayne Haggerty Road",
    image: "/images/agent-2.png",
    socialLinks: {
      facebook: "https://www.facebook.com/",
      twitter: "https://www.twitter.com/",
      linkedin: "https://www.linkedin.com/",
    },
  },
  {
    id: 3,
    name: "James Combs",
    email: "james@email.com",
    phone: "(555) 258-1598",
    location: "61 Ottis Street Oklahoma City",
    image: "/images/agent-3.png",
    socialLinks: {
      facebook: "https://www.facebook.com/",
      twitter: "https://www.twitter.com/",
      linkedin: "https://www.linkedin.com/",
    },
  },
  {
    id: 4,
    name: "Margaret Wade",
    email: "margaret@email.com",
    phone: "(431) 335-2321",
    location: "69 Leverton Cove Road Springfield",
    image: "/images/agent-4.png",
    socialLinks: {
      facebook: "https://www.facebook.com/",
      twitter: "https://www.twitter.com/",
      linkedin: "https://www.linkedin.com/",
    },
  },
  {
    id: 5,
    name: "Mike Harris",
    email: "harris@email.com",
    phone: "(605) 823-8868",
    location: "30 Hartway Street Mclaughlin",
    image: "/images/agent-5.png",
    socialLinks: {
      facebook: "https://www.facebook.com/",
      twitter: "https://www.twitter.com/",
      linkedin: "https://www.linkedin.com/",
    },
  },
  {
    id: 6,
    name: "Emily Jones",
    email: "emily@email.com",
    phone: "(617) 756-9911",
    location: "1654 Valley View Drive Brighton",
    image: "/images/agent-6.png",
    socialLinks: {
      facebook: "https://www.facebook.com/",
      twitter: "https://www.twitter.com/",
      linkedin: "https://www.linkedin.com/",
    },
  },
  {
    id: 7,
    name: "Trent Heiser",
    email: "heiser@email.com",
    phone: "(507) 646-1869",
    location: "46 Trymore Road Northfield",
    image: "/images/agent-7.png",
    socialLinks: {
      facebook: "https://www.facebook.com/",
      twitter: "https://www.twitter.com/",
      linkedin: "https://www.linkedin.com/",
    },
  },
  {
    id: 8,
    name: "Amiee Brown",
    email: "brown@email.com",
    phone: "(602) 525-5444",
    location: "79 Hall Street Las Vegas",
    image: "/images/agent-8.png",
    socialLinks: {
      facebook: "https://www.facebook.com/",
      twitter: "https://www.twitter.com/",
      linkedin: "https://www.linkedin.com/",
    },
  },
  {
    id: 9,
    name: "Edward Lebouef",
    email: "lebouef@email.com",
    phone: "(337) 456-7858",
    location: "05 Sherwood Circle Lafayette",
    image: "/images/agent-9.png",
    socialLinks: {
      facebook: "https://www.facebook.com/",
      twitter: "https://www.twitter.com/",
      linkedin: "https://www.linkedin.com/",
    },
  },
  {
    id: 10,
    name: "Marilyn Kelly",
    email: "marilyn@email.com",
    phone: "(864) 933-2339",
    location: "46 Brown Avenue Anderson",
    image: "/images/agent-10.png",
    socialLinks: {
      facebook: "https://www.facebook.com/",
      twitter: "https://www.twitter.com/",
      linkedin: "https://www.linkedin.com/",
    },
  },
  {
    id: 11,
    name: "Gary Manes",
    email: "manes@email.com",
    phone: "(603) 258-7598",
    location: "75 Wildrose Lane Southfield",
    image: "/images/agent-11.png",
    socialLinks: {
      facebook: "https://www.facebook.com/",
      twitter: "https://www.twitter.com/",
      linkedin: "https://www.linkedin.com/",
    },
  },
  {
    id: 12,
    name: "Francis Berg",
    email: "francis@email.com",
    phone: "(651) 778-2290",
    location: "93 Park Boulevard Ottumwa",
    image: "/images/agent-12.png",
    socialLinks: {
      facebook: "https://www.facebook.com/",
      twitter: "https://www.twitter.com/",
      linkedin: "https://www.linkedin.com/",
    },
  },
];

const AgentList = () => {
  const [currentPage, setCurrentPage] = useState(1);
  const agentsPerPage = 6;

  // Calculate the indices of the agents to be displayed on the current page
  const indexOfLastAgent = currentPage * agentsPerPage;
  const indexOfFirstAgent = indexOfLastAgent - agentsPerPage;
  const currentAgents = agents.slice(indexOfFirstAgent, indexOfLastAgent);

  // Calculate total pages
  const totalPages = Math.ceil(agents.length / agentsPerPage);

  // Handle page change
  const handlePageChange = (page) => {
    setCurrentPage(page);
  };

  return (
    <>
      <Row className="justify-content-center">
        {currentAgents.map((agent) => (
          <Col key={agent.id} sm={6} lg={4} xl={6} xxl={4}>
            <Card className="bg-white border-0 rounded-3 mb-4">
              <div className="d-flex">
                <div className="flex-shrink-0">
                  <div className="bg-body pe-3 pb-3 bg-for-dark-mode">
                    <Image
                      src={agent.image}
                      className="rounded-3"
                      alt={agent.name}
                      width={70}
                      height={70}
                    />
                  </div>
                </div>
                <div className="flex-grow-1 p-20 pb-0">
                  <h4 className="mb-1 fs-14 fw-medium">{agent.name}</h4>
                  <span className="text-primary">{agent.email}</span>
                </div>
              </div>
              <Card.Body className="p-4">
                <ul className="ps-0 mb-4 list-unstyled">
                  <li className="mb-2 pb-1">
                    <span className="text-secondary">Phone:</span>
                    <span>{agent.phone}</span>
                  </li>
                  <li className="mb-0">
                    <span className="text-secondary">Location:</span>
                    <span>{agent.location}</span>
                  </li>
                </ul>

                <ul className="ps-0 mb-4 list-unstyled d-flex flex-wrap gap-3">
                  <li>
                    <a
                      href={agent.socialLinks.facebook}
                      target="_blank"
                      className="d-inline-block text-center rounded-circle text-decoration-none text-white"
                      style={{
                        width: "30px",
                        height: "30px",
                        lineHeight: "30px",
                        backgroundColor: "#3A559F",
                      }}
                    >
                      <i className="ri-facebook-fill text-white"></i>
                    </a>
                  </li>
                  <li>
                    <a
                      href={agent.socialLinks.twitter}
                      target="_blank"
                      className="d-inline-block text-center rounded-circle text-decoration-none text-white"
                      style={{
                        width: "30px",
                        height: "30px",
                        lineHeight: "30px",
                        backgroundColor: "#03A9F4",
                      }}
                    >
                      <i className="ri-twitter-x-line text-white"></i>
                    </a>
                  </li>
                  <li>
                    <a
                      href={agent.socialLinks.linkedin}
                      target="_blank"
                      className="d-inline-block text-center rounded-circle text-decoration-none text-white"
                      style={{
                        width: "30px",
                        height: "30px",
                        lineHeight: "30px",
                        backgroundColor: "#007AB9",
                      }}
                    >
                      <i className="ri-linkedin-fill text-white"></i>
                    </a>
                  </li>
                </ul>

                <div className="d-flex align-items-center">
                  <Link
                    href="/apps/chat/"
                    className="btn btn-primary py-2 px-3 fw-medium"
                  >
                    Message
                  </Link>
                  <Link
                    href="/real-estate/agent-overview/"
                    className="btn btn-outline-primary py-2 px-3 fw-medium ms-3"
                  >
                    View Profile
                  </Link>
                </div>
              </Card.Body>
            </Card>
          </Col>
        ))}

        <Col sm={12}>
          <Card className="border-0 bg-white p-4 mb-4 rounded-3">
            <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap">
              <span className="fs-12 fw-medium">
                Showing {indexOfFirstAgent + 1} of {agents.length} Results
              </span>

              <nav aria-label="Page navigation example">
                <ul className="pagination mb-0 justify-content-center">
                  <li className="page-item">
                    <Button
                      className="page-link icon"
                      onClick={() =>
                        currentPage > 1 && handlePageChange(currentPage - 1)
                      }
                    >
                      <i className="material-symbols-outlined">
                        keyboard_arrow_left
                      </i>
                    </Button>
                  </li>
                  {Array.from({ length: totalPages }).map((_, index) => (
                    <li key={index} className="page-item">
                      <Button
                        className={`page-link ${currentPage === index + 1 ? "active" : ""}`}
                        onClick={() => handlePageChange(index + 1)}
                      >
                        {index + 1}
                      </Button>
                    </li>
                  ))}
                  <li className="page-item">
                    <Button
                      className="page-link icon"
                      onClick={() =>
                        currentPage < totalPages &&
                        handlePageChange(currentPage + 1)
                      }
                    >
                      <i className="material-symbols-outlined">
                        keyboard_arrow_right
                      </i>
                    </Button>
                  </li>
                </ul>
              </nav>
            </div>
          </Card>
        </Col>
      </Row>
    </>
  );
};

export default AgentList;
