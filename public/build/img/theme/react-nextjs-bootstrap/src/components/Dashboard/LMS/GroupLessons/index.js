"use client";

import { useState } from "react";
import { Dropdown, Card, Table, Button } from "react-bootstrap";
import Image from "next/image";
import Link from "next/link";

const groupLessonsData = [
  {
    images: [
      {
        img: "/images/user-20.jpg",
      },
      {
        img: "/images/user-21.jpg",
      },
      {
        img: "/images/user-6.jpg",
      },
    ],
    name: "Digital Marketing",
    date: "15 March 2024",

    link: "#",
  },
  {
    images: [
      {
        img: "/images/user-22.jpg",
      },
      {
        img: "/images/user-23.jpg",
      },
      {
        img: "/images/user-24.jpg",
      },
    ],
    name: "Web Development",
    date: "10 March 2024",
    link: "#",
  },
  {
    images: [
      {
        img: "/images/user-25.jpg",
      },
      {
        img: "/images/user-26.jpg",
      },
      {
        img: "/images/user-27.jpg",
      },
    ],
    name: "UX/UI Design",
    date: "05 March 2024",
    link: "#",
  },
  {
    images: [
      {
        img: "/images/user-28.jpg",
      },
      {
        img: "/images/user-29.jpg",
      },
      {
        img: "/images/user-30.jpg",
      },
    ],
    name: "Content Writer",
    date: "02 March 2024",
    link: "#",
  },
  {
    images: [
      {
        img: "/images/user-28.jpg",
      },
      {
        img: "/images/user-29.jpg",
      },
      {
        img: "/images/user-30.jpg",
      },
    ],
    name: "Content Writer",
    date: "02 March 2024",
    link: "#",
  },
  {
    images: [
      {
        img: "/images/user-25.jpg",
      },
      {
        img: "/images/user-26.jpg",
      },
      {
        img: "/images/user-27.jpg",
      },
    ],
    name: "UX/UI Design",
    date: "05 March 2024",
    link: "#",
  },
];

const GroupLessons = () => {
  const [currentPage, setCurrentPage] = useState(1);
  const itemsPerPage = 5;

  const totalItems = groupLessonsData.length;
  const totalPages = Math.ceil(totalItems / itemsPerPage);

  const startIndex = (currentPage - 1) * itemsPerPage;
  const endIndex = startIndex + itemsPerPage;
  const currentData = groupLessonsData.slice(startIndex, endIndex);

  const handleNextPage = () => {
    if (currentPage < totalPages) setCurrentPage(currentPage + 1);
  };

  const handlePrevPage = () => {
    if (currentPage > 1) setCurrentPage(currentPage - 1);
  };

  return (
    <Card className="bg-white border-0 rounded-3 mb-4">
      <Card.Body className="p-0">
        <div className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <h3 className="mb-0">Group Lessons</h3>

            <Dropdown className="action-opt">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="bg-transparent p-0"
              >
                <span className="material-symbols-outlined">more_horiz</span>
              </Dropdown.Toggle>
              <Dropdown.Menu className="bg-white border box-shadow">
                {/* Dropdown items */}
              </Dropdown.Menu>
            </Dropdown>
          </div>
        </div>

        <div className="default-table-area style-two top-instructors">
          <div className="table-responsive">
            <Table className="align-middle border-0">
              <tbody>
                {currentData.map((lesson, index) => (
                  <tr key={index} className="gl-tr">
                    <td>
                      <div className="d-flex align-items-center">
                        <div className="flex-shrink-0">
                          <div className="d-flex">
                            {lesson.images.map((image, i) => (
                              <Image
                                key={i}
                                src={image.img}
                                className="wh-44 rounded-circle border border-2 border-color-white minus-l-20"
                                alt="user"
                                width={44}
                                height={44}
                              />
                            ))}
                          </div>
                        </div>
                        <div className="flex-grow-1 ms-2 position-relative top-2">
                          <h6 className="mb-0 fs-14 fw-medium">
                            {lesson.name}
                          </h6>
                          <span className="fs-12 text-body">{lesson.date}</span>
                        </div>
                      </div>
                    </td>
                    <td className="text-end">
                      <Link
                        href={lesson.link}
                        className="wh-35 d-inline-block border text-center lh-35 rounded-circle text-decoration-none hover-bg"
                      >
                        <i className="ri-arrow-right-up-line fs-18"></i>
                      </Link>
                    </td>
                  </tr>
                ))}
              </tbody>
            </Table>
          </div>
        </div>

        <div className="p-4">
          <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap">
            <span className="fs-12 fw-medium">
              Items per page: {itemsPerPage}
            </span>
            <div className="d-flex align-items-center">
              <span className="fs-12 fw-medium me-2">
                {startIndex + 1} - {Math.min(endIndex, totalItems)} of{" "}
                {totalItems}
              </span>
              <nav aria-label="Page navigation example">
                <ul className="pagination mb-0 justify-content-center">
                  <li className="page-item">
                    <Button
                      onClick={handlePrevPage}
                      disabled={currentPage === 1}
                      className="page-link icon"
                    >
                      <span className="material-symbols-outlined">
                        keyboard_arrow_left
                      </span>
                    </Button>
                  </li>
                  <li className="page-item">
                    <Button
                      onClick={handleNextPage}
                      disabled={currentPage === totalPages}
                      className="page-link icon"
                    >
                      <span className="material-symbols-outlined">
                        keyboard_arrow_right
                      </span>
                    </Button>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </Card.Body>
    </Card>
  );
};

export default GroupLessons;
