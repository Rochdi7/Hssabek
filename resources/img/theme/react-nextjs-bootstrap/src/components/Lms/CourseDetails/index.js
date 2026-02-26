"use client";

import { Card } from "react-bootstrap";
import Image from "next/image";

const CourseDetails = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-0">
          <div className="p-4">
            <h3 className="mb-0">Courses</h3>
          </div>

          <div className="default-table-area style-two all-projects pb-4">
            <div className="table-responsive">
              <table className="table align-middle">
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
                  <tr>
                    <td className="text-body">#854</td>

                    <td>Cybersecurity Awareness</td>

                    <td>Technology</td>

                    <td>
                      <div className="d-flex align-items-center">
                        <div className="flex-shrink-0">
                          <Image
                            src="/images/user-42.jpg"
                            className="wh-34 rounded-circle"
                            alt="user"
                            width={34}
                            height={34}
                          />
                        </div>
                        <div className="flex-grow-1 ms-2 position-relative top-1">
                          <h6 className="mb-0 fs-14 fw-medium">Oliver Khan</h6>
                        </div>
                      </div>
                    </td>

                    <td className="text-body">180</td>

                    <td className="text-body">25 Mar 2024</td>

                    <td className="text-body">25 Apr 2024</td>

                    <td>$49.99</td>

                    <td>
                      <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                        <span className="material-symbols-outlined fs-16 text-body">
                          edit
                        </span>
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default CourseDetails;
