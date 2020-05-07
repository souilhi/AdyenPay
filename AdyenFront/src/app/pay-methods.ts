export interface Paiement {
    groups?: (GroupsEntity)[] | null;
    paymentMethods?: (PaymentMethodsEntity)[] | null;
  }
  export interface GroupsEntity {
    name: string;
    types?: (string)[] | null;
  }
  export interface PaymentMethodsEntity {
    brands?: (string)[] | null;
    details?: (DetailsEntity)[] | null;
    name: string;
    type: string;
    supportsRecurring?: boolean | null;
  }
  export interface DetailsEntity {
    key: string;
    type: string;
    optional?: boolean | null;
  }
  