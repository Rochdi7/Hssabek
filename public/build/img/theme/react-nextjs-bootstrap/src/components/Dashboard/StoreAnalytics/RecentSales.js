"use client";

import { useState, useEffect } from "react";
import { Dropdown } from "react-bootstrap";
import Image from "next/image";

const RecentSales = () => {
  const [sales, setSales] = useState([]);
  const [loading, setLoading] = useState(true);

  // Pagination state (optional)
  const [currentPage, setCurrentPage] = useState(1);
  const itemsPerPage = 5;

  useEffect(() => {
    // Simulate an API call to fetch recent sales data
    setTimeout(() => {
      const data = [
        {
          ref: "#001",
          customerName: "Johhna Loren",
          customerImage: "/images/user-81.png",
          grandTotal: "$6240",
          paidStatus: "Paid",
          paymentMethod: {
            name: "PayPal",
            logo: "/images/paypal.png",
          },
          status: {
            label: "Completed",
            badgeClass:
              "bg-success bg-opacity-10 text-success border border-success",
          },
        },
        {
          ref: "#002",
          customerName: "Skyler White",
          customerImage: "/images/user-82.png",
          grandTotal: "$5135",
          paidStatus: "Due",
          paymentMethod: {
            name: "Wise",
            logo: "/images/wise.png",
          },
          status: {
            label: "Pending",
            badgeClass:
              "bg-primary-div bg-opacity-10 text-primary-div border border-primary-div",
          },
        },
        {
          ref: "#003",
          customerName: "Alice Johnson",
          customerImage: "/images/user-83.png",
          grandTotal: "$4320",
          paidStatus: "Paid",
          paymentMethod: {
            name: "Visa",
            logo: "/images/visa.png",
          },
          status: {
            label: "Completed",
            badgeClass:
              "bg-success bg-opacity-10 text-success border border-success",
          },
        },
        {
          ref: "#004",
          customerName: "Bob Smith",
          customerImage: "/images/user-84.png",
          grandTotal: "$2980",
          paidStatus: "Due",
          paymentMethod: {
            name: "Mastercard",
            logo: "/images/mastercard.png",
          },
          status: {
            label: "Pending",
            badgeClass:
              "bg-primary-div bg-opacity-10 text-primary-div border border-primary-div",
          },
        },
        {
          ref: "#005",
          customerName: "Charlie Brown",
          customerImage: "/images/user-85.png",
          grandTotal: "$5590",
          paidStatus: "Paid",
          paymentMethod: {
            name: "American Express",
            logo: "/images/amex.png",
          },
          status: {
            label: "Completed",
            badgeClass:
              "bg-success bg-opacity-10 text-success border border-success",
          },
        },
        {
          ref: "#006",
          customerName: "Dana White",
          customerImage: "/images/user-86.png",
          grandTotal: "$6100",
          paidStatus: "Due",
          paymentMethod: {
            name: "Discover",
            logo: "/images/discover.png",
          },
          status: {
            label: "Pending",
            badgeClass:
              "bg-primary-div bg-opacity-10 text-primary-div border border-primary-div",
          },
        },
        {
          ref: "#007",
          customerName: "Eleanor Rigby",
          customerImage: "/images/user-87.png",
          grandTotal: "$4750",
          paidStatus: "Paid",
          paymentMethod: {
            name: "Stripe",
            logo: "/images/stripe.png",
          },
          status: {
            label: "Completed",
            badgeClass:
              "bg-success bg-opacity-10 text-success border border-success",
          },
        },
        {
          ref: "#008",
          customerName: "Frank Castle",
          customerImage: "/images/user-88.png",
          grandTotal: "$3890",
          paidStatus: "Due",
          paymentMethod: {
            name: "Payoneer",
            logo: "/images/payoneer.png",
          },
          status: {
            label: "Pending",
            badgeClass:
              "bg-primary-div bg-opacity-10 text-primary-div border border-primary-div",
          },
        },
        {
          ref: "#009",
          customerName: "Grace Hopper",
          customerImage: "/images/user-89.png",
          grandTotal: "$5220",
          paidStatus: "Paid",
          paymentMethod: {
            name: "Google Pay",
            logo: "/images/googlepay.png",
          },
          status: {
            label: "Completed",
            badgeClass:
              "bg-success bg-opacity-10 text-success border border-success",
          },
        },
        {
          ref: "#010",
          customerName: "Henry Cavill",
          customerImage: "/images/user-90.png",
          grandTotal: "$4475",
          paidStatus: "Due",
          paymentMethod: {
            name: "Apple Pay",
            logo: "/images/applepay.png",
          },
          status: {
            label: "Pending",
            badgeClass:
              "bg-primary-div bg-opacity-10 text-primary-div border border-primary-div",
          },
        },
      ];

      setSales(data);
      setLoading(false);
    }, 1000);
  }, []);

  // Optional pagination logic
  const totalPages = Math.ceil(sales.length / itemsPerPage);
  const indexOfLastItem = currentPage * itemsPerPage;
  const indexOfFirstItem = indexOfLastItem - itemsPerPage;
  const currentSales = sales.slice(indexOfFirstItem, indexOfLastItem);

  const goToPage = (pageNumber) => setCurrentPage(pageNumber);
  const goToPrevPage = () =>
    currentPage > 1 && setCurrentPage((prev) => prev - 1);
  const goToNextPage = () =>
    currentPage < totalPages && setCurrentPage((prev) => prev + 1);

  return (
    <>
      <div className="card bg-white border-0 rounded-3 mb-4">
        <div className="card-body p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <h3 className="mb-0">Recent Sales</h3>

            <Dropdown className="dropdown select-dropdown">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="dropdown-toggle bg-border-color border text-body rounded-2"
              >
                This Month
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  This Day
                </Dropdown.Item>

                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  This Week
                </Dropdown.Item>

                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  This Month
                </Dropdown.Item>

                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  This Year
                </Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>

          {loading ? (
            <p>Loading...</p>
          ) : (
            <div className="default-table-area style-two campaigns-table">
              <div className="table-responsive">
                <table className="table align-middle border-0">
                  <thead>
                    <tr className="border-bottom">
                      <th
                        scope="col"
                        className=" bg-transparent text-body fw-medium"
                      >
                        <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                          REF
                        </span>
                      </th>
                      <th
                        scope="col"
                        className="bg-transparent text-body fw-medium"
                      >
                        <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                          CUSTOMER
                        </span>
                      </th>
                      <th
                        scope="col"
                        className="bg-transparent text-body fw-medium"
                      >
                        <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                          GRAND TOTAL
                        </span>
                      </th>
                      <th
                        scope="col"
                        className="bg-transparent text-body fw-medium"
                      >
                        <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                          PAID
                        </span>
                      </th>
                      <th
                        scope="col"
                        className="bg-transparent text-body fw-medium"
                      >
                        <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                          PAYMENT METHOD
                        </span>
                      </th>
                      <th
                        scope="col"
                        className="text-end bg-transparent text-body fw-medium"
                      >
                        <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                          STATUS
                        </span>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    {(currentSales.length ? currentSales : sales).map(
                      (sale, index) => (
                        <tr key={index}>
                          <td className="fs-12 fw-semibold text-body-color-50">
                            {sale.ref}
                          </td>

                          <td>
                            <div className="d-flex align-items-center">
                              <div className="flex-shrink-0">
                                <Image
                                  src={sale.customerImage}
                                  className="rounded-circle"
                                  alt={sale.customerName}
                                  width={40}
                                  height={40}
                                />
                              </div>
                              <div className="flex-grow-1 ms-2">
                                <h4 className="fs-14 fw-semibold mb-0 text-secondary-50">
                                  {sale.customerName}
                                </h4>
                              </div>
                            </div>
                          </td>

                          <td className="fs-12 fw-semibold text-body-color-50">
                            {sale.grandTotal}
                          </td>

                          <td className="fs-12 fw-semibold text-body-color-50">
                            {sale.paidStatus}
                          </td>

                          <td>
                            <div className="d-flex align-items-center gap-1">
                              <Image
                                src={sale.paymentMethod.logo}
                                alt={sale.paymentMethod.name}
                                width={24}
                                height={24}
                              />
                              <span className="ms-2 text-body-color-50 fs-12 fw-semibold">
                                {sale.paymentMethod.name}
                              </span>
                            </div>
                          </td>

                          <td className="text-end">
                            <span
                              className={`d-inline-block px-2 ${sale.status.badgeClass} rounded-pill fs-12 fw-medium`}
                            >
                              {sale.status.label}
                            </span>
                          </td>
                        </tr>
                      )
                    )}
                  </tbody>
                </table>
              </div>

              {/* Render pagination only if there are more than itemsPerPage entries */}
              {sales.length > itemsPerPage && (
                <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap mt-4">
                  <span className="fs-12 fw-medium">
                    Showing {currentSales.length} of {sales.length} Results
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
              )}
            </div>
          )}
        </div>
      </div>
    </>
  );
};

export default RecentSales;
