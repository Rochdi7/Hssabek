import AverageOrderValue from "@/components/Dashboard/PosSystem/AverageOrderValue";
import Categories from "@/components/Dashboard/PosSystem/Categories";
import CustomerSegmentation from "@/components/Dashboard/PosSystem/CustomerSegmentation";
import OrderDetails from "@/components/Dashboard/PosSystem/OrderDetails";
import SalesAnalytics from "@/components/Dashboard/PosSystem/SalesAnalytics";
import TotalDiscount from "@/components/Dashboard/PosSystem/TotalDiscount";
import TotalSales from "@/components/Dashboard/PosSystem/TotalSales";
import TotalTransactions from "@/components/Dashboard/PosSystem/TotalTransactions";
import { Row, Col } from "react-bootstrap";

export default function Page() {
  return (
    <>
      <Row>
        <Col xxl={3} sm={6}>
          <TotalSales />
        </Col>

        <Col xxl={3} sm={6}>
          <TotalTransactions />
        </Col>

        <Col xxl={3} sm={6}>
          <AverageOrderValue />
        </Col>

        <Col xxl={3} sm={6}>
          <TotalDiscount />
        </Col>
      </Row>

      <Row>
        <Col lg={8}>
          <SalesAnalytics />
        </Col>

        <Col lg={4}>
          <CustomerSegmentation />
        </Col>
      </Row>

      <Row>
        <Col xxl={8}>
          <Categories />
        </Col>

        <Col xxl={4}>
          <OrderDetails />
        </Col>
      </Row>
    </>
  );
}
