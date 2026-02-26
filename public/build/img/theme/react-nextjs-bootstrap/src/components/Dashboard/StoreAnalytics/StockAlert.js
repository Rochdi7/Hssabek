"use client";

import { useState } from "react";
import { Card, Table, Dropdown } from "react-bootstrap";
import Image from "next/image";

const products = [
  {
    code: "#3421",
    name: "ZenX Laptop",
    image: "/images/product-20.png",
    store: "Store 01",
    quantity: 5,
    alertQuantity: 10,
  },
  {
    code: "#3429",
    name: "Macbook Pro",
    image: "/images/product-21.png",
    store: "Store 02",
    quantity: 3,
    alertQuantity: 15,
  },
  {
    code: "#3430",
    name: "Gaming Mouse",
    image: "/images/product-22.png",
    store: "Store 03",
    quantity: 8,
    alertQuantity: 20,
  },
  {
    code: "#3431",
    name: "Wireless Keyboard",
    image: "/images/product-23.png",
    store: "Store 01",
    quantity: 2,
    alertQuantity: 5,
  },
  {
    code: "#3432",
    name: "USB-C Hub",
    image: "/images/product-24.png",
    store: "Store 02",
    quantity: 10,
    alertQuantity: 25,
  },
  {
    code: "#3433",
    name: "Monitor Stand",
    image: "/images/product-25.png",
    store: "Store 04",
    quantity: 1,
    alertQuantity: 5,
  },
  {
    code: "#3434",
    name: "External Hard Drive",
    image: "/images/product-26.png",
    store: "Store 03",
    quantity: 7,
    alertQuantity: 10,
  },
  {
    code: "#3435",
    name: "Webcam",
    image: "/images/product-27.png",
    store: "Store 01",
    quantity: 4,
    alertQuantity: 8,
  },
  {
    code: "#3436",
    name: "Laptop Stand",
    image: "/images/product-28.png",
    store: "Store 02",
    quantity: 6,
    alertQuantity: 12,
  },
  {
    code: "#3437",
    name: "Mechanical Keyboard",
    image: "/images/product-29.png",
    store: "Store 04",
    quantity: 3,
    alertQuantity: 6,
  },
];

const StockAlert = () => {
  // Pagination state
  const [currentPage, setCurrentPage] = useState(1);
  const itemsPerPage = 5;

  // Calculate total pages
  const totalPages = Math.ceil(products.length / itemsPerPage);

  // Get products for the current page
  const indexOfLastItem = currentPage * itemsPerPage;
  const indexOfFirstItem = indexOfLastItem - itemsPerPage;
  const currentProducts = products.slice(indexOfFirstItem, indexOfLastItem);

  // Handlers for pagination
  const goToPage = (pageNumber) => setCurrentPage(pageNumber);
  const goToPrevPage = () =>
    currentPage > 1 && setCurrentPage((prev) => prev - 1);
  const goToNextPage = () =>
    currentPage < totalPages && setCurrentPage((prev) => prev + 1);

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h3 className="mb-1">Stock Alert</h3>

          <div className="default-table-area style-two campaigns-table">
            <div className="table-responsive">
              <Table className="align-middle border-0">
                <thead>
                  <tr className="border-bottom">
                    <th
                      scope="col"
                      className="bg-transparent text-body fw-medium"
                    >
                      <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                        CODE
                      </span>
                    </th>
                    <th
                      scope="col"
                      className="bg-transparent text-body fw-medium"
                    >
                      <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                        PRODUCT
                      </span>
                    </th>
                    <th
                      scope="col"
                      className="bg-transparent text-body fw-medium text-center"
                    >
                      <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                        STORE
                      </span>
                    </th>
                    <th
                      scope="col"
                      className="bg-transparent text-body fw-medium text-center"
                    >
                      <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                        QUANTITY
                      </span>
                    </th>
                    <th
                      scope="col"
                      className="bg-transparent text-body fw-medium text-center"
                    >
                      <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                        ALERT QUANTITY
                      </span>
                    </th>
                    <th
                      scope="col"
                      className="text-end bg-transparent text-body fw-medium"
                    >
                      <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                        ACTION
                      </span>
                    </th>
                  </tr>
                </thead>

                <tbody>
                  {currentProducts.map((product, index) => (
                    <tr key={index}>
                      <td className="fs-12 fw-semibold text-body-color-50">
                        {product.code}
                      </td>

                      <td>
                        <div className="d-flex align-items-center gap-2">
                          <div className="flex-shrink-0">
                            <Image
                              src={product.image}
                              className="rounded-1"
                              alt="product"
                              width={30}
                              height={30}
                            />
                          </div>
                          <div className="flex-grow-1">
                            <h4 className="fs-14 fw-semibold mb-0 text-secondary-50">
                              {product.name}
                            </h4>
                          </div>
                        </div>
                      </td>

                      <td className="fs-12 fw-semibold text-body-color-50 text-center">
                        {product.store}
                      </td>

                      <td className="fs-12 fw-semibold text-body-color-50 text-center">
                        {product.quantity}
                      </td>

                      <td className="text-center">
                        <span className="fw-medium fs-12 text-danger bg-danger bg-opacity-10 border border-danger px-2 rounded-pill d-inline-block">
                          {product.alertQuantity}
                        </span>
                      </td>

                      <td className="text-end">
                        <Dropdown className="action-opt">
                          <Dropdown.Toggle
                            variant="secondary"
                            id="dropdown-basic"
                            className="bg-transparent p-0 lh-1"
                          >
                            <i className="material-symbols-outlined">
                              more_vert
                            </i>
                          </Dropdown.Toggle>

                          <Dropdown.Menu className="bg-white border box-shadow">
                            <Dropdown.Item href="#">
                              <i className="material-symbols-outlined">edit</i>
                              Edit
                            </Dropdown.Item>
                            <Dropdown.Item href="#">
                              <i className="material-symbols-outlined">
                                visibility
                              </i>
                              View
                            </Dropdown.Item>
                            <Dropdown.Item href="#">
                              <i className="material-symbols-outlined">
                                delete
                              </i>
                              Delete
                            </Dropdown.Item>
                          </Dropdown.Menu>
                        </Dropdown>
                      </td>
                    </tr>
                  ))}
                </tbody>
              </Table>
            </div>

            <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap mt-4">
              <span className="fs-12 fw-medium">
                {" "}
                Showing {currentProducts.length} of {products.length} Results
              </span>

              <nav aria-label="Page navigation example">
                <ul className="pagination mb-0 justify-content-center">
                  <li className="page-item">
                    <button
                      className={`page-link icon hover-bg ${
                        currentPage === 1 ? "disabled" : ""
                      }`}
                      onClick={goToPrevPage}
                    >
                      <i className="material-symbols-outlined">
                        keyboard_arrow_left
                      </i>
                    </button>
                  </li>

                  {Array.from({ length: totalPages }, (_, i) => i + 1).map(
                    (page) => (
                      <li key={page} className="page-item">
                        <button
                          className={`page-link ${
                            currentPage === page ? "active" : ""
                          }`}
                          onClick={() => goToPage(page)}
                        >
                          {page}
                        </button>
                      </li>
                    )
                  )}

                  <li className="page-item">
                    <button
                      className={`page-link icon hover-bg ${
                        currentPage === totalPages ? "disabled" : ""
                      }`}
                      onClick={goToNextPage}
                    >
                      <i className="material-symbols-outlined">
                        keyboard_arrow_right
                      </i>
                    </button>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default StockAlert;
