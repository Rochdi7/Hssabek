"use client";
 
import React, { useState } from "react";
import { Card, Form, Table } from "react-bootstrap";

const mediaFilesData = [
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
    fileName: "Audio File",
    owner: "Winona Etzel",
    listedDate: "08 Nov 2024",
    fileType: ".mp3",
    fileSize: "1.3 GB",
    fileItems: "136",
  },
  {
    fileName: "Personal Photo",
    owner: "Annie Carver",
    listedDate: "09 Nov 2024",
    fileType: ".gif",
    fileSize: "1.2 GB",
    fileItems: "175",
  },
];

const Media = () => {
  // State for pagination
  const [currentPage, setCurrentPage] = useState(1);
  const itemsPerPage = 8; // You can change this value based on how many items you want per page

  // Calculate the index range for the current page
  const startIndex = (currentPage - 1) * itemsPerPage;
  const endIndex = startIndex + itemsPerPage;

  // Slice the data based on the current page
  const paginatedData = mediaFilesData.slice(startIndex, endIndex);

  // Total number of pages
  const totalPages = Math.ceil(mediaFilesData.length / itemsPerPage);

  // Handle page change
  const handlePageChange = (page) => {
    if (page >= 1 && page <= totalPages) {
      setCurrentPage(page);
    }
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-4">
            <h3 className="mb-0">Media</h3>

            <Form.Select
              className="month-select form-control"
              aria-label="Default select example"
            >
              <option defaultValue="0">Select</option>
              <option defaultValue="1">Today</option>
              <option defaultValue="2">Weekly</option>
              <option defaultValue="3">Monthly</option>
              <option defaultValue="4">Yearly</option>
            </Form.Select>
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
                  {paginatedData.map((file, i) => (
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

              <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap">
                <span className="fs-12 fw-medium">
                  Showing {startIndex + 1} to{" "}
                  {Math.min(endIndex, mediaFilesData.length)} of{" "}
                  {mediaFilesData.length} Results
                </span>

                <nav aria-label="Page navigation example">
                  <ul className="pagination mb-0 justify-content-center">
                    <li className="page-item">
                      <button
                        className="page-link icon"
                        onClick={() => handlePageChange(currentPage - 1)}
                      >
                        <span className="material-symbols-outlined">
                          keyboard_arrow_left
                        </span>
                      </button>
                    </li>

                    {[...Array(totalPages).keys()].map((num) => (
                      <li className="page-item" key={num + 1}>
                        <button
                          className={`page-link ${
                            currentPage === num + 1 ? "active" : ""
                          }`}
                          onClick={() => handlePageChange(num + 1)}
                        >
                          {num + 1}
                        </button>
                      </li>
                    ))}

                    <li className="page-item">
                      <button
                        className="page-link icon"
                        onClick={() => handlePageChange(currentPage + 1)}
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
    </>
  );
};

export default Media;
