"use client";

import React, { useState } from "react";
import { Card, Form, Table, Button } from "react-bootstrap";

const recentFilesData = [
  {
    fileName: "Dashboard Design",
    owner: "Linda Maddox",
    listedDate: "20 Nov 2024",
    fileType: ".pdf",
    fileSize: "1.2 GB",
    fileItems: "69",
  },
  {
    fileName: "Important Documents",
    owner: "Juanita Lavigne",
    listedDate: "18 Nov 2024",
    fileType: ".zip",
    fileSize: "2.6 GB",
    fileItems: "236",
  },
  {
    fileName: "Product Design",
    owner: "Roy Pope",
    listedDate: "17 Nov 2024",
    fileType: ".psd",
    fileSize: "3.2 GB",
    fileItems: "365",
  },
  {
    fileName: "Dashboard Design File",
    owner: "Cecil Jones",
    listedDate: "15 Nov 2024",
    fileType: ".fig",
    fileSize: "1 GB",
    fileItems: "25",
  },
  {
    fileName: "Media Files",
    owner: "Trudy Venegas",
    listedDate: "14 Nov 2024",
    fileType: ".jpg",
    fileSize: "1.5 GB",
    fileItems: "153",
  },
  {
    fileName: "Graphic Design File",
    owner: "Sharilyn Goodall",
    listedDate: "13 Nov 2024",
    fileType: ".png",
    fileSize: "1.6 GB",
    fileItems: "142",
  },
  {
    fileName: "Personal Photo",
    owner: "Annie Carver",
    listedDate: "09 Nov 2024",
    fileType: ".gif",
    fileSize: "1.2 GB",
    fileItems: "175",
  },
  {
    fileName: "Audio File",
    owner: "Winona Etzel",
    listedDate: "08 Nov 2024",
    fileType: ".mp3",
    fileSize: "1.3 GB",
    fileItems: "136",
  },
  {
    fileName: "Project Files",
    owner: "David Smith",
    listedDate: "07 Nov 2024",
    fileType: ".docx",
    fileSize: "4.5 GB",
    fileItems: "89",
  },
  {
    fileName: "Meeting Notes",
    owner: "Jessica Adams",
    listedDate: "05 Nov 2024",
    fileType: ".txt",
    fileSize: "500 MB",
    fileItems: "42",
  },
];

const ITEMS_PER_PAGE = 7;

const RecentFiles = () => {
  // Modal
  const [isShowModal, setShowModal] = useState("false");
  const handleToggleShowModal = () => {
    setShowModal(!isShowModal);
  };

  // Table
  const [currentPage, setCurrentPage] = useState(1);
  const totalPages = Math.ceil(recentFilesData.length / ITEMS_PER_PAGE);

  // Get paginated items for the current page
  const currentItems = recentFilesData.slice(
    (currentPage - 1) * ITEMS_PER_PAGE,
    currentPage * ITEMS_PER_PAGE
  );

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-4">
            <h3 className="mb-0">Recent Files</h3>

            <div className="d-flex align-items-center gap-2">
              <div className="text-end">
                <button
                  className="btn btn-outline-primary py-1 px-2 px-sm-4 fs-14 fw-medium rounded-3 hover-bg"
                  onClick={handleToggleShowModal}
                >
                  <span className="py-sm-1 d-block">
                    <i className="ri-add-line"></i>
                    <span>Add New File</span>
                  </span>
                </button>
              </div>
            </div>
          </div>

          <div className="default-table-area recent-files">
            <div className="table-responsive">
              <Table className="align-middle">
                <thead>
                  <tr>
                    <th scope="col">File Name</th>
                    <th scope="col">Owner</th>
                    <th scope="col">Listed Date</th>
                    <th scope="col">File Type</th>
                    <th scope="col">File Size</th>
                    <th scope="col">File Items</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>

                <tbody>
                  {currentItems.map((file, i) => (
                    <tr key={i}>
                      <td className="text-body">
                        <div className="d-flex align-items-center">
                          <span className="material-symbols-outlined fs-28 text-warning">
                            folder
                          </span>
                          <div className="ms-2">
                            <h6 className="fw-medium fs-14 position-relative top-1 m-0">
                              {file.fileName}
                            </h6>
                          </div>
                        </div>
                      </td>

                      <td className="text-body">{file.owner}</td>

                      <td>{file.listedDate}</td>

                      <td className="text-body">{file.fileType}</td>

                      <td className="text-body">{file.fileSize}</td>

                      <td>{file.fileItems}</td>

                      <td>
                        <div className="d-flex align-items-center gap-1">
                          <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                            <span className="material-symbols-outlined fs-16 text-primary">
                              visibility
                            </span>
                          </button>

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

              {/* Pagination */}
              <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap">
                <span className="fs-12 fw-medium">
                  Showing {currentItems.length} of {recentFilesData.length}{" "}
                  Results
                </span>

                <nav aria-label="Page navigation example">
                  <ul className="pagination mb-0 justify-content-center">
                    <li className="page-item">
                      <button
                        className={`page-link icon ${
                          currentPage === 1 ? "disabled" : ""
                        }`}
                        onClick={() =>
                          setCurrentPage((prev) => Math.max(prev - 1, 1))
                        }
                      >
                        <span className="material-symbols-outlined">
                          keyboard_arrow_left
                        </span>
                      </button>
                    </li>

                    {[...Array(totalPages)].map((_, index) => (
                      <li key={index} className="page-item">
                        <button
                          className={`page-link ${
                            currentPage === index + 1 ? "active" : ""
                          }`}
                          onClick={() => setCurrentPage(index + 1)}
                        >
                          {index + 1}
                        </button>
                      </li>
                    ))}

                    <li className="page-item">
                      <button
                        className={`page-link icon ${
                          currentPage === totalPages ? "disabled" : ""
                        }`}
                        onClick={() =>
                          setCurrentPage((prev) =>
                            Math.min(prev + 1, totalPages)
                          )
                        }
                      >
                        <span className="material-symbols-outlined">
                          keyboard_arrow_right
                        </span>
                      </button>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </Card.Body>
      </Card>

      {/* Modal */}
      <div className={`custom-modal right ${isShowModal ? "" : "show"}`}>
        <div className="custom-modal-content position-relative z-3">
          <div className="border-bottom py-3 px-4 d-flex align-items-center justify-content-between">
            <h3 className="fs-18 mb-0">Create New Files</h3>

            <div className="close-link" onClick={handleToggleShowModal}>
              <span className="material-symbols-outlined">close</span>
            </div>
          </div>

          <div className="p-4">
            <Form>
              <Form.Group className="mb-4">
                <Form.Label className="label">File Name</Form.Label>
                <Form.Control
                  type="text"
                  className="text-dark"
                  placeholder="File Name"
                />
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">Owner</Form.Label>
                <Form.Control
                  type="text"
                  className="text-dark"
                  placeholder="Owner"
                />
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">Listed Date</Form.Label>
                <Form.Control type="date" className="text-dark" />
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">File Type</Form.Label>
                <Form.Select
                  className="form-control text-dark"
                  aria-label="Default select example"
                >
                  <option>Select</option>
                  <option defaultValue="0">.pdf</option>
                  <option defaultValue="1">.zip</option>
                  <option defaultValue="1">.psd</option>
                  <option defaultValue="2">.file</option>
                </Form.Select>
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">File Size</Form.Label>
                <Form.Select
                  className="form-control text-dark"
                  aria-label="Default select example"
                >
                  <option>Select</option>
                  <option defaultValue="0">1GP</option>
                  <option defaultValue="1">1.5GP</option>
                  <option defaultValue="2">2GP</option>
                  <option defaultValue="3">2.5GP</option>
                </Form.Select>
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">File Items</Form.Label>
                <Form.Select
                  className="form-control text-dark"
                  aria-label="Default select example"
                >
                  <option>Select</option>
                  <option defaultValue="0">10</option>
                  <option defaultValue="1">20</option>
                  <option defaultValue="2">30</option>
                  <option defaultValue="3">40</option>
                  <option defaultValue="4">50</option>
                </Form.Select>
              </Form.Group>

              <Form.Group className="d-flex gap-3">
                <Button
                  variant="primary"
                  type="submit"
                  className="text-white fw-semibold py-2 px-2 px-sm-3"
                >
                  <span className="py-sm-1 d-block">
                    <i className="ri-add-line text-white"></i>{" "}
                    <span>Create New File</span>
                  </span>
                </Button>
              </Form.Group>
            </Form>
          </div>
        </div>
        <div className="close-outside" onClick={handleToggleShowModal}></div>
      </div>
    </>
  );
};

export default RecentFiles;
