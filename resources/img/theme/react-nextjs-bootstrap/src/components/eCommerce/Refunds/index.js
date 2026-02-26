"use client";

import { Card, Form, Table } from "react-bootstrap";
import Image from "next/image";
import Pagination from "./Pagination";
import SearchForm from "./SearchForm";

const refundsData = [
  {
    id: "#999",
    customerImg: "/images/user-6.jpg",
    customerName: "Oliver Khan",
    date: "19 Jun 2024",
    noOrderReturned: 2,
    noOrderRefunded: 1,
    noOrderReplaced: 0,
    totalRefunded: "$42.00",
    totalReplaced: "$50.00",
  },
  {
    id: "#998",
    customerImg: "/images/user-7.jpg",
    customerName: "Marcia Baker",
    date: "19 Jun 2024",
    noOrderReturned: 1,
    noOrderRefunded: 1,
    noOrderReplaced: 0,
    totalRefunded: "$32.00",
    totalReplaced: "$54.00",
  },
  {
    id: "#997",
    customerImg: "/images/user-8.jpg",
    customerName: "Carolyn Barnes",
    date: "20 Jun 2024",
    noOrderReturned: 2,
    noOrderRefunded: 7,
    noOrderReplaced: 4,
    totalRefunded: "$53.00",
    totalReplaced: "$67.00",
  },
  {
    id: "#996",
    customerImg: "/images/user-9.jpg",
    customerName: "Donna Miller",
    date: "21 Jun 2024",
    noOrderReturned: 3,
    noOrderRefunded: 1,
    noOrderReplaced: 2,
    totalRefunded: "$42.00",
    totalReplaced: "$56.00",
  },
  {
    id: "#995",
    customerImg: "/images/user-10.jpg",
    customerName: "Barbara Cross",
    date: "22 Jun 2024",
    noOrderReturned: 5,
    noOrderRefunded: 2,
    noOrderReplaced: 7,
    totalRefunded: "$24.00",
    totalReplaced: "$45.00",
  },
  {
    id: "#994",
    customerImg: "/images/user-11.jpg",
    customerName: "Rebecca Block",
    date: "23 Jun 2024",
    noOrderReturned: 5,
    noOrderRefunded: 6,
    noOrderReplaced: 2,
    totalRefunded: "$53.00",
    totalReplaced: "$56.00",
  },
  {
    id: "#993",
    customerImg: "/images/user-12.jpg",
    customerName: "Ramiro McCarty",
    date: "24 Jun 2024",
    noOrderReturned: 2,
    noOrderRefunded: 6,
    noOrderReplaced: 1,
    totalRefunded: "$52.00",
    totalReplaced: "$67.00",
  },
  {
    id: "#992",
    customerImg: "/images/user-13.jpg",
    customerName: "Robert Fairweather",
    date: "25 Jun 2024",
    noOrderReturned: 6,
    noOrderRefunded: 5,
    noOrderReplaced: 4,
    totalRefunded: "$42.00",
    totalReplaced: "$46.00",
  },
  {
    id: "#991",
    customerImg: "/images/user-14.jpg",
    customerName: "Marcelino Haddock",
    date: "26 Jun 2024",
    noOrderReturned: 7,
    noOrderRefunded: 2,
    noOrderReplaced: 5,
    totalRefunded: "$44.00",
    totalReplaced: "$68.00",
  },
  {
    id: "#990",
    customerImg: "/images/user-15.jpg",
    customerName: "Thomas Wilson",
    date: "27 Jun 2024",
    noOrderReturned: 5,
    noOrderRefunded: 1,
    noOrderReplaced: 6,
    totalRefunded: "$99.00",
    totalReplaced: "$742.00",
  },
];

const Refunds = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3 mb-md-4">
            <SearchForm />

            <Form.Select
              className="month-select form-control p-0 h-auto border-0"
              aria-label="Default select example"
            >
              <option defaultValue="0">This Month</option>
              <option defaultValue="1">Last Month</option>
              <option defaultValue="2">Last Year</option>
            </Form.Select>
          </div>

          <div className="default-table-area all-products">
            <div className="table-responsive">
              <Table className="align-middle">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Date</th>
                    <th scope="col" className="text-end">
                      No. Order Returned
                    </th>
                    <th scope="col" className="text-end">
                      No. Order Refunded
                    </th>
                    <th scope="col" className="text-end">
                      No. Order Replaced
                    </th>
                    <th scope="col" className="text-end">
                      Total Refunded{" "}
                    </th>
                    <th scope="col" className="text-end">
                      Total Replaced
                    </th>
                  </tr>
                </thead>
                <tbody>
                  {refundsData &&
                    refundsData.slice(0, 10).map((value, i) => (
                      <tr key={i}>
                        <td className="text-body">{value.id}</td>

                        <td>
                          <div className="d-flex align-items-center">
                            <div className="flex-shrink-0">
                              <Image
                                src={value.customerImg}
                                className="wh-34 rounded-circle"
                                alt="user"
                                width={34}
                                height={34}
                              />
                            </div>
                            <div className="flex-grow-1 ms-2 position-relative top-1">
                              <h6 className="mb-0 fs-14 fw-medium">
                                {value.customerName}
                              </h6>
                            </div>
                          </div>
                        </td>

                        <td>{value.date}</td>

                        <td className="text-end">{value.noOrderReturned}</td>

                        <td className="text-end">{value.noOrderRefunded}</td>

                        <td className="text-end">{value.noOrderReplaced}</td>

                        <td className="text-end">{value.totalRefunded}</td>

                        <td className="text-end">{value.totalReplaced}</td>
                      </tr>
                    ))}
                </tbody>
              </Table>
            </div>

            {/* Pagination */}
            <Pagination />
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default Refunds;
