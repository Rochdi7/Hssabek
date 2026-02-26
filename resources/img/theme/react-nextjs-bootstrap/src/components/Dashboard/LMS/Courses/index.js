"use client";

import { Card, Form, Table, Button } from "react-bootstrap";
import Link from "next/link";
import Image from "next/image";
import { useState } from "react";

const courseData = [
  {
    id: "#854",
    courseName: "Cybersecurity Awareness",
    detailsLink: "/lms/courses/details/",
    category: "Technology",
    instructorImg: "/images/user-6.jpg",
    instructorName: "Oliver Khan",
    enrolled: 180,
    startDate: "25 Mar 2024",
    endDate: "25 Apr 2024",
    price: "$49.99",
  },
  {
    id: "#853",
    courseName: "Python Programming",
    detailsLink: "/lms/courses/details/",
    category: "Science",
    instructorImg: "/images/user-7.jpg",
    instructorName: "Ava Cooper",
    enrolled: 250,
    startDate: "20 Mar 2024",
    endDate: "20 Apr 2024",
    price: "$45.32",
  },
  {
    id: "#852",
    courseName: "Big Data Analytics",
    detailsLink: "/lms/courses/details/",
    category: "Health & Wellness",
    instructorImg: "/images/user-8.jpg",
    instructorName: "Isabella Evans",
    enrolled: 320,
    startDate: "15 Mar 2024",
    endDate: "15 Apr 2024",
    price: "$99.00",
  },
  {
    id: "#851",
    courseName: "Introduction to Blockchain",
    detailsLink: "/lms/courses/details/",
    category: "Education",
    instructorImg: "/images/user-9.jpg",
    instructorName: "Mia Hughes",
    enrolled: 135,
    startDate: "10 Mar 2024",
    endDate: "10 Apr 2024",
    price: "$29.75",
  },
  {
    id: "#850",
    courseName: "Network Administration",
    detailsLink: "/lms/courses/details/",
    category: "Food & Cooking",
    instructorImg: "/images/user-10.jpg",
    instructorName: "Noah Mitchell",
    enrolled: 460,
    startDate: "05 Mar 2024",
    endDate: "05 Apr 2024",
    price: "$56.99",
  },
  {
    id: "#849",
    courseName: "Artificial Intelligence",
    detailsLink: "/lms/courses/details/",
    category: "Lifestyle & Fashion",
    instructorImg: "/images/user-11.jpg",
    instructorName: "Oliver Khan",
    enrolled: 515,
    startDate: "10 Feb 2024",
    endDate: "10 Mar 2024",
    price: "$78.75",
  },
  {
    id: "#849",
    courseName: "Artificial Intelligence",
    detailsLink: "/lms/courses/details/",
    category: "Lifestyle & Fashion",
    instructorImg: "/images/user-11.jpg",
    instructorName: "Oliver Khan",
    enrolled: 515,
    startDate: "10 Feb 2024",
    endDate: "10 Mar 2024",
    price: "$78.75",
  },
  {
    id: "#850",
    courseName: "Network Administration",
    detailsLink: "/lms/courses/details/",
    category: "Food & Cooking",
    instructorImg: "/images/user-10.jpg",
    instructorName: "Noah Mitchell",
    enrolled: 460,
    startDate: "05 Mar 2024",
    endDate: "05 Apr 2024",
    price: "$56.99",
  },
];

const Courses = () => {
  const [currentPage, setCurrentPage] = useState(1);
  const itemsPerPage = 5;

  const totalPages = Math.ceil(courseData.length / itemsPerPage);

  const handlePrevPage = () => {
    setCurrentPage((prevPage) => Math.max(prevPage - 1, 1));
  };

  const handleNextPage = () => {
    setCurrentPage((prevPage) => Math.min(prevPage + 1, totalPages));
  };

  const startIndex = (currentPage - 1) * itemsPerPage;
  const displayedCourses = courseData.slice(
    startIndex,
    startIndex + itemsPerPage
  );

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-0">
          <div className="p-4">
            <div className="d-flex justify-content-between align-items-center flex-wrap gap-3">
              <h3 className="mb-0">Courses</h3>

              <Form.Select
                className="month-select form-control p-0 h-auto border-0"
                aria-label="Default select example"
              >
                <option defaultValue="0">All Courses</option>
                <option defaultValue="1">Paid</option>
                <option defaultValue="2">Free</option>
                <option defaultValue="3">Top Rated</option>
                <option defaultValue="4">Best Seller</option>
              </Form.Select>
            </div>
          </div>

          <div className="default-table-area style-two all-projects">
            <div className="table-responsive">
              <Table className="align-middle">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Instructor</th>
                    <th scope="col">Enrolled</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  {displayedCourses.map((defaultValue, i) => (
                    <tr key={i}>
                      <td className="text-body">{defaultValue.id}</td>
                      <td>
                        <Link href={defaultValue.detailsLink}>
                          {defaultValue.courseName}
                        </Link>
                      </td>
                      <td>{defaultValue.category}</td>
                      <td>
                        <div className="d-flex align-items-center">
                          <div className="flex-shrink-0">
                            <Image
                              src={defaultValue.instructorImg}
                              className="wh-34 rounded-circle"
                              alt="user"
                              width={34}
                              height={34}
                            />
                          </div>
                          <div className="flex-grow-1 ms-2 position-relative top-1">
                            <h6 className="mb-0 fs-14 fw-medium">
                              {defaultValue.instructorName}
                            </h6>
                          </div>
                        </div>
                      </td>
                      <td className="text-body">{defaultValue.enrolled}</td>
                      <td className="text-body">{defaultValue.startDate}</td>
                      <td className="text-body">{defaultValue.endDate}</td>
                      <td>{defaultValue.price}</td>
                      <td>
                        <div className="d-flex align-items-center gap-1">
                          <Link href={defaultValue.detailsLink}>
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

            <div className="p-4 pt-lg-4">
              <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap">
                <span className="fs-12 fw-medium">
                  Showing {startIndex + 1} to{" "}
                  {Math.min(startIndex + itemsPerPage, courseData.length)} of{" "}
                  {courseData.length} Results
                </span>

                <nav aria-label="Page navigation example">
                  <ul className="pagination mb-0 justify-content-center">
                    <li
                      className={`page-item ${currentPage === 1 && "disabled"}`}
                    >
                      <Button
                        className="page-link icon"
                        onClick={handlePrevPage}
                        disabled={currentPage === 1}
                      >
                        <span className="material-symbols-outlined">
                          keyboard_arrow_left
                        </span>
                      </Button>
                    </li>
                    <li
                      className={`page-item ${
                        currentPage === totalPages && "disabled"
                      }`}
                    >
                      <Button
                        className="page-link icon"
                        onClick={handleNextPage}
                        disabled={currentPage === totalPages}
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
    </>
  );
};

export default Courses;
